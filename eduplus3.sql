-- Crear base de datos
CREATE DATABASE eduplus3;
USE eduplus3;

-- Crear tablas
CREATE TABLE estadoConsulta (
    idEstadoConsulta INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estado VARCHAR(255) NOT NULL
);

CREATE TABLE estadoReserva (
    idEstadoReserva INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estado VARCHAR(255) NOT NULL
);

CREATE TABLE cursos (
    idCursos INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreCurso VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
);

CREATE TABLE dia (
    idDia INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE rol (
    idRol INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE usuario (
    idUsuario INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DNI VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    idRol INT UNSIGNED NOT NULL,
    FOREIGN KEY (idRol) REFERENCES rol (idRol)
);

CREATE TABLE profesor (
    idProfesor INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    departamento VARCHAR(255) NOT NULL,
    especialidad VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    idUsuario INT UNSIGNED NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario)
);

CREATE TABLE alumno (
    idAlumno INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    grado INT NOT NULL,
    curso VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    idUsuario INT UNSIGNED NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario)
);

CREATE TABLE reserva (
    idReservas INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fechaReserva DATE NOT NULL,
    horaReserva TIME NOT NULL,
    idEstadoReserva INT UNSIGNED NOT NULL,
    idProfesor INT UNSIGNED NOT NULL,
    idAlumno INT UNSIGNED NOT NULL,
    FOREIGN KEY (idEstadoReserva) REFERENCES estadoReserva (idEstadoReserva),
    FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor),
    FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno)
);

CREATE TABLE consultas (
    idConsultas INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    fechaEnvio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    respuesta TEXT NOT NULL,
    fechaRespuesta TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idEstadoConsulta INT UNSIGNED NOT NULL,
    idProfesor INT UNSIGNED NOT NULL,
    idAlumno INT UNSIGNED NOT NULL,
    FOREIGN KEY (idEstadoConsulta) REFERENCES estadoConsulta (idEstadoConsulta),
    FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor),
    FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno)
);

CREATE TABLE horario (
    idHorario INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    seccion VARCHAR(255) NOT NULL,
    horarioInicio TIME NOT NULL,
    horarioFin TIME NOT NULL,
    aula VARCHAR(255) NOT NULL,
    idDia INT UNSIGNED NOT NULL,
    idAlumno INT UNSIGNED NOT NULL,
    idProfesor INT UNSIGNED NOT NULL,
    FOREIGN KEY (idDia) REFERENCES dia (idDia),
    FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno),
    FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor)
);

CREATE TABLE alumnoCurso (
    idAlumno INT UNSIGNED NOT NULL,
    idCurso INT UNSIGNED NOT NULL,
    añoEscolar DATE NOT NULL,
    estado VARCHAR(255) NOT NULL,
    PRIMARY KEY (idAlumno, idCurso),
    FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno),
    FOREIGN KEY (idCurso) REFERENCES cursos (idCursos)
);

CREATE TABLE notas (
    idNotas INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    materia VARCHAR(255) NOT NULL,
    nota DECIMAL(8, 2) NOT NULL,
    fechaRegistro TIMESTAMP NOT NULL,
    idProfesor INT UNSIGNED NOT NULL,
    idAlumnos INT UNSIGNED NOT NULL,
    FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor),
    FOREIGN KEY (idAlumnos) REFERENCES alumno (idAlumno)
);

CREATE TABLE Anuncios (
    idAnuncio INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    fechaPublicada TIMESTAMP NOT NULL,
    idProfesor INT UNSIGNED NOT NULL,
    FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor)
);

CREATE TABLE disponibilidadProf (
    idDisponibilidadProf INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    horaInicio TIME NOT NULL,
    horaFinal TIME NOT NULL,
    idDia INT UNSIGNED NOT NULL,
    idProfesor INT UNSIGNED NOT NULL,
    FOREIGN KEY (idDia) REFERENCES dia (idDia),
    FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor)
);

-- Agregar las claves foráneas en su lugar correspondiente, ya se incluyen en la definición de las tablas.


-- Agregar claves foráneas
ALTER TABLE consultas ADD CONSTRAINT consultas_idestadoconsulta_foreign FOREIGN KEY (idEstadoConsulta) REFERENCES estadoConsulta (idEstadoConsulta);
ALTER TABLE reserva ADD CONSTRAINT reserva_idprofesor_foreign FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor);
ALTER TABLE consultas ADD CONSTRAINT consultas_idprofesor_foreign FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor);
ALTER TABLE reserva ADD CONSTRAINT reserva_idestadoreserva_foreign FOREIGN KEY (idEstadoReserva) REFERENCES estadoReserva (idEstadoReserva);
ALTER TABLE horario ADD CONSTRAINT horario_idalumno_foreign FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno);
ALTER TABLE alumnoCurso ADD CONSTRAINT alumnocurso_idalumno_foreign FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno);
ALTER TABLE horario ADD CONSTRAINT horario_iddia_foreign FOREIGN KEY (idDia) REFERENCES dia (idDia);
ALTER TABLE reserva ADD CONSTRAINT reserva_idalumno_foreign FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno);
ALTER TABLE horario ADD CONSTRAINT horario_idprofesor_foreign FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor);
ALTER TABLE notas ADD CONSTRAINT notas_idalumnos_foreign FOREIGN KEY (idAlumnos) REFERENCES alumno (idAlumno);
ALTER TABLE Anuncios ADD CONSTRAINT anuncios_idprofesor_foreign FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor);
ALTER TABLE notas ADD CONSTRAINT notas_idprofesor_foreign FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor);
ALTER TABLE disponibilidadProf ADD CONSTRAINT disponibilidadprof_idprofesor_foreign FOREIGN KEY (idProfesor) REFERENCES profesor (idProfesor);
ALTER TABLE alumnoCurso ADD CONSTRAINT alumnocurso_idcurso_foreign FOREIGN KEY (idCurso) REFERENCES cursos (idCursos);
ALTER TABLE consultas ADD CONSTRAINT consultas_idalumno_foreign FOREIGN KEY (idAlumno) REFERENCES alumno (idAlumno);
ALTER TABLE disponibilidadProf ADD CONSTRAINT disponibilidadprof_iddia_foreign FOREIGN KEY (idDia) REFERENCES dia (idDia);
ALTER TABLE profesor ADD CONSTRAINT profesor_idusuario_foreign FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario);
ALTER TABLE usuario ADD CONSTRAINT usuario_idrol_foreign FOREIGN KEY (idRol) REFERENCES rol (idRol);
ALTER TABLE alumno ADD CONSTRAINT alumno_idusuario_foreign FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario);
