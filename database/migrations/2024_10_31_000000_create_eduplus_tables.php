<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('idRol');
            $table->string('nombre');
        });

        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('password');
            $table->unsignedInteger('idRol');
            $table->foreign('idRol')->references('idRol')->on('rol');
        });

        Schema::create('profesor', function (Blueprint $table) {
            $table->increments('idProfesor');
            $table->string('departamento')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->unsignedInteger('idUsuario');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuario');
        });

        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('idAlumno');
            $table->date('fecha')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('grado')->nullable();
            $table->string('curso')->nullable();
            $table->unsignedInteger('idUsuario');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuario');
        });

        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('idCursos');
            $table->string('nombreCurso');
            $table->text('descripcion')->nullable();
        });

        Schema::create('dia', function (Blueprint $table) {
            $table->increments('idDia');
        });

        Schema::create('estadoconsulta', function (Blueprint $table) {
            $table->increments('idEstadoConsulta');
            $table->string('estado');
        });

        Schema::create('estadoreserva', function (Blueprint $table) {
            $table->increments('idEstadoReserva');
            $table->string('estado');
        });

        Schema::create('alumnocurso', function (Blueprint $table) {
            $table->unsignedInteger('idAlumno');
            $table->unsignedInteger('idCurso');
            $table->date('añoEscolar');
            $table->string('estado');
            $table->primary(['idAlumno', 'idCurso']);
            $table->foreign('idAlumno')->references('idAlumno')->on('alumno');
            $table->foreign('idCurso')->references('idCursos')->on('cursos');
        });

        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('idAnuncio');
            $table->string('titulo');
            $table->text('descripcion');
            $table->timestamp('fechaPublicada')->useCurrent();
            $table->unsignedInteger('idProfesor');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesor');
        });

        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('idConsultas');
            $table->string('nombres');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->text('descripcion');
            $table->date('fechaEnvio')->nullable();
            $table->text('respuesta');
            $table->date('fechaRespuesta')->nullable();
            $table->unsignedInteger('idEstadoConsulta');
            $table->unsignedInteger('idProfesor');
            $table->unsignedInteger('idAlumno');
            $table->foreign('idEstadoConsulta')->references('idEstadoConsulta')->on('estadoconsulta');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesor');
            $table->foreign('idAlumno')->references('idAlumno')->on('alumno');
        });

        Schema::create('disponibilidadprof', function (Blueprint $table) {
            $table->increments('idDisponibilidadProf');
            $table->unsignedInteger('idProfesor');
            $table->date('fecha');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesor');
        });

        Schema::create('horario', function (Blueprint $table) {
            $table->increments('idHorario');
            $table->string('seccion');
            $table->time('horarioInicio');
            $table->time('horarioFin');
            $table->string('aula');
            $table->unsignedInteger('idDia');
            $table->unsignedInteger('idAlumno');
            $table->unsignedInteger('idProfesor');
            $table->foreign('idDia')->references('idDia')->on('dia');
            $table->foreign('idAlumno')->references('idAlumno')->on('alumno');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesor');
        });

        Schema::create('notas', function (Blueprint $table) {
            $table->increments('idNotas');
            $table->string('materia');
            $table->decimal('nota', 8, 2);
            $table->timestamp('fechaRegistro')->useCurrent();
            $table->unsignedInteger('idProfesor');
            $table->unsignedInteger('idAlumnos');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesor');
            $table->foreign('idAlumnos')->references('idAlumno')->on('alumno');
        });

        Schema::create('reserva', function (Blueprint $table) {
            $table->increments('idReservas');
            $table->date('fechaReserva');
            $table->time('horaReserva');
            $table->unsignedInteger('idEstadoReserva');
            $table->unsignedInteger('idProfesor');
            $table->unsignedInteger('idAlumno');
            $table->foreign('idEstadoReserva')->references('idEstadoReserva')->on('estadoreserva');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesor');
            $table->foreign('idAlumno')->references('idAlumno')->on('alumno');
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        foreach ([
            'reserva', 'notas', 'horario', 'disponibilidadprof', 'consultas',
            'anuncios', 'alumnocurso', 'estadoreserva', 'estadoconsulta', 'dia',
            'cursos', 'alumno', 'profesor', 'usuario', 'rol',
        ] as $table) {
            Schema::dropIfExists($table);
        }
        Schema::enableForeignKeyConstraints();
    }
};