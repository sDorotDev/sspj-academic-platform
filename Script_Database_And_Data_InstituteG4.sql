-- Eliminar la base de datos existente si es que existe
DROP DATABASE IF EXISTS DB_InstitutoG4;

-- Crear la base de datos
CREATE DATABASE DB_InstitutoG4;

-- Usar la base de datos
USE DB_InstitutoG4;

-- Crear tablas
CREATE TABLE TB_EstudioCateg (
    IDEstudCat INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100),
    dt_Creacion DATE DEFAULT CURRENT_DATE,
    dt_Act DATE,
    Activo BIT DEFAULT 1
); 

CREATE TABLE TB_Carrera (
    IDCarrera INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100),
    IDEstudCat INT,
    dt_Creacion DATE DEFAULT CURRENT_DATE,
    dt_Act DATE,
    Activo BIT DEFAULT 1,
    FOREIGN KEY (IDEstudCat) REFERENCES TB_EstudioCateg(IDEstudCat)
);

CREATE TABLE TB_Curso (
    IDCurso INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100),
    Creditos INT,
    IDEstudCat INT,
    dt_Creacion DATE DEFAULT CURRENT_DATE,
    dt_Act DATE, 
    Activo BIT DEFAULT 1,
    FOREIGN KEY (IDEstudCat) REFERENCES TB_EstudioCateg(IDEstudCat)
);

CREATE TABLE TB_Rol (
    IDRol INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100)
);

CREATE TABLE TB_Usuario (
		IDUsuario INT PRIMARY KEY AUTO_INCREMENT,
		IDRol INT,
		Username VARCHAR(50) UNIQUE,
		Password VARCHAR(20),
		Correo VARCHAR(40) UNIQUE,
		dt_Creacion DATE DEFAULT CURRENT_DATE,
    dt_Act DATE, 
    Activo BIT DEFAULT 1,
    FOREIGN KEY (IDRol) REFERENCES TB_Rol(IDRol)
);


CREATE TABLE TB_Alumno (
		IDAlumno INT PRIMARY KEY AUTO_INCREMENT,
		IDUsuario INT,
		Nombres VARCHAR(50),
		AP_Paterno VARCHAR(20),
		AP_Materno VARCHAR(20),
		Direccion VARCHAR(100),
		Email VARCHAR(100),
		Telefono CHAR(9),
		DocumentoIdent CHAR(9),
		Sexo VARCHAR(12),
		CicloActual INT,
		BloqueActual INT,
		dt_Creacion DATE DEFAULT CURRENT_DATE,
    dt_Act DATE, 
    Activo BIT DEFAULT 1,
    FOREIGN KEY (IDUsuario) REFERENCES TB_Usuario(IDUsuario)
);


CREATE TABLE TB_Docente(
		IDDocente INT PRIMARY KEY AUTO_INCREMENT,
		IDCuenta INT,
		Nombres VARCHAR(50),
		AP_Paterno VARCHAR(20), 
		AP_Materno VARCHAR(20),
		Direccion VARCHAR(100),
		Email VARCHAR(100),
		Telefono CHAR(9),
		DocumentoIdent CHAR(9),
		Sexo VARCHAR(12),
		dt_Creacion DATE DEFAULT CURRENT_DATE,
    dt_Act DATE, 
    Activo BIT DEFAULT 1,
    FOREIGN KEY (IDCuenta) REFERENCES TB_Usuario(IDUsuario)
);

CREATE TABLE TB_BloqueAsign (
	IDBloque INT PRIMARY KEY AUTO_INCREMENT,
	IDCarrera INT,
	Seccion CHAR(8),
	Ciclo INT,
	Bloque INT,
	Turno VARCHAR(12),
	dt_Inicio DATE,
	dt_Cierre DATE,
	dt_Creacion DATE DEFAULT CURRENT_DATE,
	dt_Act DATE,
	Concluido BIT DEFAULT 0,
	Activo BIT DEFAULT 1,
	FOREIGN KEY (IDCarrera) REFERENCES TB_Carrera(IDCarrera)
);

CREATE TABLE TB_Asignatura (
		IDAsignatura INT PRIMARY KEY AUTO_INCREMENT,
		IDBloque INT,
		IDCurso INT,
		IDDocente INT,
		Clase CHAR(8),
		dt_Creacion DATE DEFAULT CURRENT_DATE,
    dt_Act DATE, 
    Activo BIT DEFAULT 1,
    FOREIGN KEY (IDBloque) REFERENCES TB_BloqueAsign(IDBloque),
    FOREIGN KEY (IDCurso) REFERENCES TB_Curso(IDCurso),
    FOREIGN KEY (IDDocente) REFERENCES TB_Docente(IDDocente)
);

CREATE TABLE TB_Matricula (
		IDMatricula INT PRIMARY KEY AUTO_INCREMENT,
		IDAlumno INT,
		IDBloque INT,
		dt_Creacion DATE DEFAULT CURRENT_DATE,
		dt_Act DATE,
		Activo BIT DEFAULT 1,
		FOREIGN KEY (IDAlumno) REFERENCES TB_Alumno(IDAlumno),
		FOREIGN KEY (IDBloque) REFERENCES TB_BloqueAsign(IDBloque)
);

-- Usar la base de datos
USE DB_InstitutoG4;

-- Registros TB_EstudioCateg
INSERT INTO TB_EstudioCateg (Nombre, dt_Act) VALUES ('Tecnologías de la información', CURRENT_DATE);
INSERT INTO TB_EstudioCateg (Nombre, dt_Act) VALUES ('Diseño y Comunicaciones', CURRENT_DATE);
INSERT INTO TB_EstudioCateg (Nombre, dt_Act) VALUES ('Salud', CURRENT_DATE);
INSERT INTO TB_EstudioCateg (Nombre, dt_Act) VALUES ('Banca y Finanzas', CURRENT_DATE);
INSERT INTO TB_EstudioCateg (Nombre, dt_Act) VALUES ('Gestión y Negocios', CURRENT_DATE);
INSERT INTO TB_EstudioCateg (Nombre, dt_Act) VALUES ('Hotelería y Arte Culinario', CURRENT_DATE);
INSERT INTO TB_EstudioCateg (Nombre, dt_Act) VALUES ('Modas', CURRENT_DATE);

-- Registros TB_Carrera
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Aministración de Empresas',5,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Marketing',5,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Administración de Negocios Internacionales',5,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Gestión de Logística',5,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Secretariado Ejecutivo',5,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Desarrollo de Software',1,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Administración de redes',1,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Comunicación Audiovisual',2,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Diseño gráfico',2,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Periodismo',2,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Enfermería Técnica',3,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Fisioterapia y Rehabilitación',3,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Técnico en Farmacia',3,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Administración de Negocios Bancarios',4,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Contabilidad',4,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Gastronomía y Gestión Culinaria',6,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Administración de Restaurantes y Hoteles',6,CURRENT_DATE);
INSERT INTO TB_Carrera (Nombre,IDEstudCat,dt_Act) VALUES ('Diseño de modas',1,CURRENT_DATE);

-- Registros TB_Curso
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión Estratégica', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Liderazgo Organizacional', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Economía Empresarial', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Dirección de Proyectos', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Negociación y Resolución de Conflictos', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Ética Empresarial', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Emprendimiento', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de la Calidad', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Análisis Financiero', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Estrategias de Ventas', 4, 5, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing de Contenidos', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing Relacional', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Análisis de Consumidores', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Redes Sociales', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing de Influencia', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Estrategias de Branding', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing Internacional', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing de Servicios', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing Analítico', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing Digital Avanzado', 4, 5, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Derecho Internacional de los Negocios', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Economía Internacional', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Logística Global', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing Internacional', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Comercio Internacional', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Negociación Internacional Avanzada', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Aduanas y Trámites Internacionales', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Finanzas Internacionales', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Emprendimiento Internacional', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Riesgos en Negocios Internacionales', 4, 5, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Inventarios y Almacenes', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Distribución y Transporte', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de la Cadena de Suministro', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Logística Inversa y Sostenibilidad', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Tecnología Aplicada a la Logística', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Proyectos Logísticos', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Legislación y Normativa Logística', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Calidad en Logística', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Estrategias de Optimización Logística', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Flotas', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Logística 4.0', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Seguridad en la Cadena de Suministro', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Logística Lean', 4, 5, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión Documental', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Protocolo Empresarial', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Organización de Eventos', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Administración de Oficinas', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión del Tiempo', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Atención al Cliente', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Técnicas de Archivo', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Comunicación Interna', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Organización de Viajes y Reuniones', 4, 5, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Correspondencia', 4, 5, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Interfaces de Usuario', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Desarrollo Ágil', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Arquitectura de Software', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Desarrollo de Aplicaciones Móviles', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Introducción a la Inteligencia Artificial', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Desarrollo de Videojuegos', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Seguridad en Desarrollo de Software', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Desarrollo de Aplicaciones Web Avanzado', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Principios de Programación', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Metodologías de Desarrollo de Software', 4, 1, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Administración de Servidores', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Ciberseguridad', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Redes Inalámbricas', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Virtualización de Servidores', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Seguridad de Redes', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Routing y Switching', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Redes', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Monitoreo de Redes', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Implementación de Firewall', 4, 1, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Troubleshooting de Redes', 4, 1, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Producción de Televisión', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Guión Audiovisual', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Postproducción de Video', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Sonido', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Realización de Documentales', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Animación 2D y 3D', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Dirección de Fotografía', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Producción Musical', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Producción', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Narrativa Audiovisual', 4, 2, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Identidad Corporativa', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Motion Graphics', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño Editorial', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Packaging', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Experiencia de Usuario (UX)', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Interfaces de Usuario (UI)', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Ilustración Digital', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Fotografía para Diseñadores', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño Gráfico Avanzado', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño Web Responsivo', 4, 2, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Periodismo Investigativo', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Periodismo de Investigación', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Periodismo Digital Avanzado', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Periodismo Multimedia', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Periodismo de Datos', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Ética Periodística en la Era Digital', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Cobertura de Conflictos y Crisis', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Narrativa Periodística', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Periodismo de Opinión', 4, 2, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Periodismo Deportivo', 4, 2, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Anatomía y Fisiología Humana', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Farmacología', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Cuidados Integrales al Paciente', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Primeros Auxilios', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Enfermería', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Enfermería en Salud Mental', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Enfermería Materno-Infantil', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Enfermería Comunitaria', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Bioética en Enfermería', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Emergencias Médicas', 4, 3, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Anatomía y Biomecánica', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Fisiología del Ejercicio', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Terapia Manual', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Rehabilitación Neurológica', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Fisioterapia Respiratoria', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Kinesioterapia', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Electroterapia', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Fisioterapia Deportiva', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Terapia Ocupacional', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Farmacología en Fisioterapia', 4, 3, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Farmacología Básica', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Dispensación de Medicamentos', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Atención Farmacéutica', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Legislación Farmacéutica', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Farmacia Hospitalaria', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Farmacotecnia', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Farmacología Clínica', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Análisis Clínicos', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Toxicología', 4, 3, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Nutrición Farmacéutica', 4, 3, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Productos y Servicios Bancarios', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Riesgos Financieros', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Banca Digital', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Análisis Crediticio', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Cartera', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Regulación Bancaria', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Banca Internacional', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Planificación Financiera', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Operaciones Bancarias', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Contabilidad Avanzada', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Control de Gestión', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Informática Aplicada a la Contabilidad', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Contabilidad Internacional', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Ética Profesional en Contabilidad', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Contabilidad para PYMES', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Sistemas de Información Contable', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Contabilidad de Sociedades', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Peritaje Contable', 4, 4, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Práctica Profesional en Contabilidad', 4, 4, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Técnicas Culinarias Básicas', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Cocina Internacional', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Pastelería y Repostería', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gastronomía Molecular', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Cocina de Autor', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Costos en Gastronomía', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Enología y Maridaje', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gastronomía Étnica', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Cocina Saludable', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Tendencias en Gastronomía', 4, 6, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión Hotelera', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Servicio al Cliente en Hostelería', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gastronomía Internacional', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing Turístico', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Eventos', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Administración de Alimentos y Bebidas', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Operaciones Hoteleras', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Recursos Humanos en Hostelería', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Planificación Estratégica Hotelera', 4, 6, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Tecnología Aplicada a la Hospitalidad', 4, 6, CURRENT_DATE);

INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Historia de la Moda', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Dibujo de Figura Humana', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Patronaje y Confección', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Materiales y Textiles', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Tendencias en Diseño de Moda', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Marketing en la Industria de la Moda', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Accesorios', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Visual Merchandising', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Fotografía de Moda', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Gestión de Marca en Moda', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Estampados y Textiles', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Producción de Moda', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño Sostenible', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Diseño de Moda Infantil', 4, 7, CURRENT_DATE);
INSERT INTO TB_Curso (Nombre, Creditos, IDEstudCat, dt_Act) VALUES ('Taller de Modelado y Escultura', 4, 7, CURRENT_DATE);

-- Registros TB_Rol
INSERT INTO TB_Rol (Nombre) VALUES ('Estudiante');
INSERT INTO TB_Rol (Nombre) VALUES ('Docente');
INSERT INTO TB_Rol (Nombre) VALUES ('Administrador');

-- Registros TB_Usuario
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'eperezg', 'password1', 'eperezg@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'glopezl', 'password2', 'glopezl@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'mhernandez', 'password3', 'mhernandez@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'sramirez', 'password4', 'sramirez@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'jlopezm', 'password5', 'jlopezm@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'mgonzalezh', 'password6', 'mgonzalezh@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'msanchezc', 'password7', 'msanchezc@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'ssuarezm', 'password8', 'ssuarezm@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'adiazr', 'password9', 'adiazr@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (1, 'mrodriguezp', 'password10', 'mrodriguezp@gmail.com', CURRENT_DATE);

INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'ggarciaf', 'docentepass1', 'ggarciaf@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'llopezd', 'docentepass2', 'llopezd@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'hernandezm', 'docentepass3', 'hernandezm@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'rodriguezm', 'docentepass4', 'rodriguezm@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'perezm', 'docentepass5', 'perezm@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'gonzalezh', 'docentepass6', 'gonzalezh@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'sanchezc', 'docentepass7', 'sanchezc@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'suarezm', 'docentepass8', 'suarezm@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'diazr', 'docentepass9', 'diazr@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (2, 'lopezp', 'docentepass10', 'lopezp@gmail.com', CURRENT_DATE);

INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (3, 'admin1', 'adminpass1', 'admin1@gmail.com', CURRENT_DATE);
INSERT INTO TB_Usuario (IDRol, Username, Password, Correo, dt_Act) VALUES (3, 'admin2', 'adminpass2', 'admin2@gmail.com', CURRENT_DATE);

-- Registros TB_Alumno
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (1, 'Eduardo', 'Pérez', 'González', 'Calle 123', 'eperezg@gmail.com', '123456789', '123456789', 'Masculino', 3, 2, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (2, 'Gabriela', 'Gómez', 'López', 'Avenida 456', 'glopezl@gmail.com', '987654321', '987654321', 'Femenino', 4, 1, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (3, 'Miguel', 'Hernández', 'Martínez', 'Calle Principal', 'mhernandez@gmail.com', '555555555', '555555555', 'Masculino', 2, 3, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (4, 'Sara', 'Ramírez', 'Sánchez', 'Avenida Central', 'sramirez@gmail.com', '777777777', '777777777', 'Femenino', 3, 1, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (5, 'Juan', 'López', 'Martínez', 'Calle 789', 'jlopezm@gmail.com', '555555555', '555555555', 'Masculino', 4, 2, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (6, 'María', 'González', 'Hernández', 'Avenida 101', 'mgonzalezh@gmail.com', '777777777', '777777777', 'Femenino', 3, 1, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (7, 'Manuel', 'Sánchez', 'Cruz', 'Calle 555', 'msanchezc@gmail.com', '555555555', '555555555', 'Masculino', 2, 3, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (8, 'Sandra', 'Suárez', 'Martínez', 'Avenida 222', 'ssuarezm@gmail.com', '777777777', '777777777', 'Femenino', 3, 1, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (9, 'Ana', 'Díaz', 'Rodríguez', 'Calle 444', 'adiazr@gmail.com', '555555555', '555555555', 'Femenino', 4, 2, CURRENT_DATE);
INSERT INTO TB_Alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act) VALUES (10, 'Miguel', 'Rodríguez', 'Pérez', 'Avenida 777', 'mrodriguezp@gmail.com', '777777777', '777777777', 'Masculino', 2, 3, CURRENT_DATE);

-- Registros TB_Docente
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (11, 'Guillermo', 'García', 'Fernández', 'Calle Principal', 'ggarciaf@gmail.com', '111111111', '111111111', 'Masculino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (12, 'Laura', 'López', 'Díaz', 'Avenida Central', 'llopezd@gmail.com', '222222222', '222222222', 'Femenino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (13, 'Marta', 'Hernández', 'Martínez', 'Calle 999', 'hernandezm@gmail.com', '333333333', '333333333', 'Femenino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (14, 'Roberto', 'Rodríguez', 'Gómez', 'Calle 666', 'rodriguezm@gmail.com', '444444444', '444444444', 'Masculino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (15, 'Pedro', 'Pérez', 'Sánchez', 'Avenida 333', 'perezm@gmail.com', '555555555', '555555555', 'Masculino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (16, 'Héctor', 'González', 'Hernández', 'Calle 222', 'gonzalezh@gmail.com', '666666666', '666666666', 'Masculino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (17, 'Carla', 'Sánchez', 'Cruz', 'Avenida 111', 'sanchezc@gmail.com', '777777777', '777777777', 'Femenino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (18, 'Sofía', 'Suárez', 'Martínez', 'Calle 777', 'suarezm@gmail.com', '888888888', '888888888', 'Femenino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (19, 'Daniel', 'Díaz', 'Rodríguez', 'Calle 888', 'diazr@gmail.com', '999999999', '999999999', 'Masculino', CURRENT_DATE);
INSERT INTO TB_Docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act) VALUES (20, 'Luis', 'López', 'Pérez', 'Avenida 555', 'lopezp@gmail.com', '101010101', '101010101', 'Masculino', CURRENT_DATE);

-- Registro TB_BloqueAsign
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (1, '1B1V1', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (1, '1B1V2', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (1, '1B1V3', 1, 1, 'Noche', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (1, '1B2V1', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (1, '1B2V2', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (1, '1B2V3', 1, 1, 'Noche', '2024-07-01', '2024-12-31', CURRENT_DATE);

INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (2, '1B1V1', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (2, '1B1V2', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (2, '1B1V3', 1, 1, 'Noche', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (2, '1B2V1', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (2, '1B2V2', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (2, '1B2V3', 1, 1, 'Noche', '2024-07-01', '2024-12-31', CURRENT_DATE);

INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (3, '1B1V1', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (3, '1B1V2', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (3, '1B1V3', 1, 1, 'Noche', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (3, '1B2V1', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (3, '1B2V2', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (3, '1B2V3', 1, 1, 'Noche', '2024-07-01', '2024-12-31', CURRENT_DATE);

INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (4, '1B1V1', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (4, '1B1V2', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (4, '1B1V3', 1, 1, 'Noche', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (4, '1B2V1', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (4, '1B2V2', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (4, '1B2V3', 1, 1, 'Noche', '2024-07-01', '2024-12-31', CURRENT_DATE);

INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (5, '1B1V1', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (5, '1B1V2', 1, 1, 'Mañana', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (5, '1B1V3', 1, 1, 'Noche', '2024-01-01', '2024-06-30', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (5, '1B2V1', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (5, '1B2V2', 1, 1, 'Mañana', '2024-07-01', '2024-12-31', CURRENT_DATE);
INSERT INTO TB_BloqueAsign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act) VALUES (5, '1B2V3', 1, 1, 'Noche', '2024-07-01', '2024-12-31', CURRENT_DATE);

-- Registro TB_Asignatura
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (1, 1, 1, '2410', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (1, 2, 2, '2411', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (1, 3, 3, '2412', CURRENT_DATE);
	 
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (2, 4, 2, '2420', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (2, 2, 3, '2421', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (2, 1, 4, '2422', CURRENT_DATE);
	 
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (3, 4, 4, '2430', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (3, 5, 2, '2431', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (3, 6, 6, '2432', CURRENT_DATE);
	 
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (4, 56, 7,'2440', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (4, 57, 8,'2441', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (4, 58, 4,'2442', CURRENT_DATE);
	 
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (6, 54, 5,'2450', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (6, 55, 2,'2451', CURRENT_DATE);
INSERT INTO TB_Asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act) VALUES (6, 74, 3,'2452', CURRENT_DATE);

-- Registro Matricula
INSERT INTO tb_matricula (IDBloque, IDAlumno, dt_Act) VALUES (1, 1, CURRENT_DATE);
INSERT INTO tb_matricula (IDBloque, IDAlumno, dt_Act) VALUES (1, 2, CURRENT_DATE);
INSERT INTO tb_matricula (IDBloque, IDAlumno, dt_Act) VALUES (1, 3, CURRENT_DATE);
INSERT INTO tb_matricula (IDBloque, IDAlumno, dt_Act) VALUES (2, 4, CURRENT_DATE);
INSERT INTO tb_matricula (IDBloque, IDAlumno, dt_Act) VALUES (2, 5, CURRENT_DATE);

-- Usar la base de datos
USE DB_InstitutoG4;

-- STORED PROCEDURES · EstudioCateg
-- # 01. VW ADM EstudioCat
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_estudiocat AS
SELECT IDEstudCat, Nombre, dt_Creacion, dt_Act FROM tb_estudiocateg WHERE Activo = 1;
//

-- # 02. VW ENUM EstudioCat
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_estudiocat AS
SELECT IDEstudCat, Nombre FROM tb_estudiocateg WHERE Activo = 1;
//

-- # 02. SP NEW EstudioCateg
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_categoria (
    IN p_nombre VARCHAR(100)
)
BEGIN
    INSERT INTO tb_estudiocateg (Nombre, dt_Act) 
    VALUES (p_nombre, CURRENT_DATE);
END;
//

-- # 03. SP UPD EstudioCateg
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_categoria (
	IN p_nombre VARCHAR(100),
	IN p_id INT    
)
BEGIN
	UPDATE tb_estudiocateg SET Nombre = p_nombre, 
	dt_Act = CURRENT_DATE
	WHERE IDEstudCat = p_id;
END;
//

-- # 04. SP DEL EstudioCateg
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_categoria (
	IN p_id INT    
)
BEGIN
	UPDATE tb_estudiocateg SET Activo = 0
	WHERE IDEstudCat= p_id;
END;
//

-- #05. SP BY EstudioCateg
DELIMITER // 
CREATE OR REPLACE PROCEDURE sp_by_categoria (
	IN p_id INT
)
BEGIN
	SELECT IDEstudCat, Nombre, dt_Creacion, dt_Act 
	FROM tb_estudiocateg 
	WHERE IDEstudCat = p_id;
END;
//

-- STORED PROCEDURES · Carrera
-- # 01. VW ADM Carreras
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_carreras AS
SELECT IDCarrera, Nombre, IDEstudCat, dt_Creacion, dt_Act FROM tb_carrera WHERE Activo = 1;
//

-- # 01. VW ENUM EstudioCat
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_carreras AS
SELECT IDCarrera, Nombre FROM tb_carrera WHERE Activo = 1;
//

-- # 02. SP NEW Carrera
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_carrera (
    IN p_nombre VARCHAR(100),
    IN p_idEstudCat INT
)
BEGIN
    INSERT INTO tb_carrera (Nombre, IDEstudCat, dt_Act) 
    VALUES (p_nombre, p_idEstudCat, CURRENT_DATE);
END;
//

-- # 03. SP UPD Carrera 
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_carrera (
	IN p_nombre VARCHAR(100),
	IN p_idEstudCat INT,
	IN p_estado BIT,
	IN p_id INT    
)
BEGIN
	UPDATE tb_carrera SET Nombre = p_nombre, 
	IDEstudCat = p_idEstudCat,
	dt_Act = CURRENT_DATE,
	Activo = p_estado 
	WHERE IDCarrera = p_id;
END;
//

-- # 04. SP DEL Carrera 
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_carrera (
	IN p_id INT    
)
BEGIN
	UPDATE tb_carrera SET Activo = 0
	WHERE IDCarrera = p_id;
END;
//

-- #05. SP BY Carrera
DELIMITER // 
CREATE OR REPLACE PROCEDURE sp_by_carrera (
	IN p_id INT
)
BEGIN
	SELECT IDCarrera, Nombre, IDEstudCat, dt_Creacion, dt_Act 
	FROM tb_carrera 
	WHERE IDCarrera = p_id;
END;
//

-- VIEWS · Rol
-- # 01. VW ENUM Rol
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_rol AS
SELECT IDRol, Nombre FROM tb_rol;
//

-- STORED PROCEDURES · Usuario
-- #01. VW ADM Usuario
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_usuario AS 
	SELECT IDUsuario, IDRol, Username, Correo, 
	dt_Creacion, dt_Act 
	FROM tb_usuario 
	WHERE Activo = 1;
//

-- #02. VW ENUM Usuario SIN Alumno
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_usuario_sin_alumno AS
	SELECT U.IDUsuario, U.Username
	FROM tb_usuario U
	LEFT JOIN tb_alumno A ON U.IDUsuario = A.IDUsuario
	WHERE A.IDAlumno IS NULL AND U.IDRol = 1;
//

-- #03. VW ENUM Usuario SIN Docente
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_usuario_sin_docente AS
	SELECT U.IDUsuario, U.Username
	FROM tb_usuario U
	LEFT JOIN tb_docente D ON U.IDUsuario = D.IDCuenta
	WHERE D.IDDocente IS NULL AND U.IDRol = 2;
//

-- #04. SP CRED Usuario // Validar credenciales 
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_cred_usuario (
    IN p_username VARCHAR(50),
    IN p_password VARCHAR(20),
    IN p_correo VARCHAR(100)
)
BEGIN
    SELECT IDUsuario, Username, Correo, IDRol
    FROM tb_usuario
    WHERE (Username = p_username OR Correo = p_correo) AND Password = p_password;
END;
//

-- #05. SP NEW Usuario
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_usuario (
	IN p_rol INT,
	IN p_username VARCHAR(50),
	IN p_password VARCHAR(20),
	IN p_correo VARCHAR(100)
)
BEGIN
	INSERT INTO tb_usuario (IDRol, Username, Password, Correo, dt_Act)
	VALUES (p_rol, p_username, p_password, p_correo, CURRENT_DATE);
END;
//

-- #06. SP UPD Usuario
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_usuario (
	IN p_rol INT,
	IN p_username VARCHAR(50),
	IN p_password VARCHAR(20),
	IN p_correo VARCHAR(100),
	IN p_id INT
)
BEGIN
	UPDATE tb_usuario SET IDRol = p_rol, Username = p_username , 
	Password = p_password, Correo = p_correo, dt_Act = CURRENT_DATE
	WHERE IDUsuario = p_id;
END;
// 

-- #07. SP DEL Usuario
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_usuario
(
	IN p_id INT
)
BEGIN
	UPDATE tb_usuario SET Activo = 0, dt_Act = CURRENT_DATE
	WHERE IDUsuario = p_id;
END;
//

-- #08. SP BY Usuario
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_by_usuario
(
	IN p_id INT
)
BEGIN
	SELECT IDUsuario, IDRol, Username, Password, Correo
	FROM tb_usuario WHERE IDUsuario = p_id;
END;
//

-- STORED PROCEDURES · BloqueAsign
-- #01. VW ADM Bloque
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_bloque AS 
    SELECT BA.IDBloque, C.Nombre AS NombreCarrera, BA.Seccion, BA.Ciclo, BA.Bloque, BA.Concluido,
        BA.dt_Inicio, BA.dt_Cierre
    FROM tb_bloqueasign BA INNER JOIN TB_Carrera C ON BA.IDCarrera = C.IDCarrera
    WHERE BA.Activo = 1 
    ORDER BY BA.Concluido ASC;
-- SELECT * FROM vw_adm_bloque;
//

-- #02. VW ENUM Bloque
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_bloque AS 
	SELECT IDBloque,
        CONCAT(Seccion, ' - INICIO ', UPPER(LEFT(MONTHNAME(dt_Inicio), 3)),  '-', RIGHT(YEAR(dt_Inicio), 2)) AS Bloque
	FROM tb_bloqueasign 
	WHERE Activo = 1 AND Concluido = 0;
-- SELECT * FROM vw_enum_bloque;
//

-- #03. SP ENUM Bloque Carrera
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_enum_bloque_carrera 
(
	IN p_IDCarrera INT
)
BEGIN 
	SELECT IDBloque,
    CONCAT(Seccion, ' - INICIO ', UPPER(LEFT(MONTHNAME(dt_Inicio), 3)),  '-', RIGHT(YEAR(dt_Inicio), 2)) AS Bloque
	FROM tb_bloqueasign 
	WHERE IDCarrera = p_IDCarrera AND Concluido = 0 AND Activo = 1;
END;
//

-- #06. SP NEW Bloque
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_bloque (
    IN p_IDCarrera INT,
    IN p_Seccion CHAR(8),
    IN p_Ciclo INT,
    IN p_Bloque INT,
    IN p_Turno VARCHAR(12),
    IN p_dt_Inicio DATE,
    IN p_dt_Cierre DATE
)
BEGIN
    INSERT INTO tb_bloqueasign (IDCarrera, Seccion, Ciclo, Bloque, Turno, dt_Inicio, dt_Cierre, dt_Act)
    VALUES (p_IDCarrera, p_Seccion, p_Ciclo, p_Bloque, p_Turno, p_dt_Inicio, p_dt_Cierre, CURRENT_DATE);
END;
//

-- #07. SP UPD Bloque
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_bloque 
(
    IN p_IDCarrera INT,
    IN p_Seccion CHAR(8),
    IN p_Ciclo INT,
    IN p_Bloque INT,
    IN p_Turno VARCHAR(12),
    IN p_concluido INT,
    IN p_dt_Inicio DATE,
    IN p_dt_Cierre DATE,
    IN p_IDBloque INT
)
BEGIN
    UPDATE tb_bloqueasign
    SET IDCarrera = p_IDCarrera, Seccion = p_Seccion, Ciclo = p_Ciclo, Bloque = p_Bloque, Turno = p_Turno, Concluido = p_concluido,
        dt_Inicio = p_dt_Inicio, dt_Cierre = p_dt_Cierre, dt_Act = CURRENT_DATE
    WHERE IDBloque = p_IDBloque;
END;
//

-- #08. SP DEL Bloque
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_bloque 
(
	IN p_IDBloque INT
)
BEGIN
	UPDATE tb_bloqueasign SET Activo = 0, dt_Act = CURRENT_DATE 
	WHERE IDBloque = p_IDBloque;
END;
//

-- #09. SP BY Bloque
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_by_bloque
(
	IN p_IDBloque INT
)
BEGIN
	SELECT IDBloque, IDCarrera, Seccion, Ciclo, Bloque, Turno, Concluido, dt_Inicio, dt_Cierre
    FROM tb_bloqueasign 
    WHERE IDBloque = p_IDBloque;
END;
//

-- STORED PROCEDURES · Curso
-- #01. VW ADM Curso
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_curso AS
	SELECT C.IDCurso, C.Nombre, C.Creditos, E.Nombre AS NombreCategoria FROM tb_curso C 
	INNER JOIN tb_estudiocateg E ON C.IDEstudCat = E.IDEstudCat WHERE C.Activo = 1;
//

-- #02. VW ENUM Curso
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_curso AS
SELECT IDCurso, Nombre FROM tb_curso WHERE Activo = 1;
//

-- #03. SP ENUM Curso Categoria
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_enum_curso_categoria
(
	IN p_idCategoria INT
)
BEGIN
	SELECT IDCurso, Nombre FROM tb_curso WHERE IDEstudCat = p_idCategoria AND Activo = 1;
END;
//

-- #04. SP NEW Curso
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_curso 
(
	IN p_Nombre VARCHAR(100),
	IN p_Creditos INT,
	IN p_Categoria INT
)
BEGIN
	INSERT INTO tb_curso (Nombre, Creditos, IDEstudCat, dt_Act) 
	VALUES (p_Nombre, p_Creditos, p_Categoria, CURRENT_DATE);
END;
//

-- #05. SP UPD Curso
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_curso 
(
	IN p_Nombre VARCHAR(100),
	IN p_Creditos INT,
	IN p_Categoria INT,
	IN p_IDCurso INT
)
BEGIN
	UPDATE tb_curso SET Nombre = p_Nombre, Creditos = p_Creditos, IDEstudCat = p_Categoria, dt_Act = CURRENT_DATE
	WHERE IDCurso = p_IDCurso;
END;
//

-- #06. SP DEL Curso
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_curso 
(
	IN p_IDCurso INT
)
BEGIN
	UPDATE tb_curso SET Activo = 0, dt_Act = CURRENT_DATE WHERE IDCurso = p_IDCurso;
END;
//

-- #07. SP BY Curso
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_by_curso 
(
	IN p_IDCurso INT
)
BEGIN
	SELECT IDCurso, Nombre, Creditos, IDEstudCat
	FROM tb_curso WHERE IDCurso = p_IDCurso;
END;
//

-- #08. SP ENUM Curso Carrera
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_enum_curso_carrera
(
	IN p_carrera INT
)
BEGIN
	SELECT C.IDCurso, C.Nombre 
	FROM tb_curso C INNER JOIN tb_carrera CA
	ON C.IDEstudCat = CA.IDEstudCat
	WHERE CA.IDCarrera = p_carrera AND C.Activo = 1;
END;
//

-- STORED PROCEDURES · Alumno
-- #01. VW ADM Alumno
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_alumno AS 
	SELECT IDAlumno, IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, 
	dt_Creacion, dt_Act 
	FROM tb_alumno 
	WHERE Activo = 1;
// 

-- #02. VW ENUM Alumno
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_alumno AS
SELECT IDAlumno, CONCAT(Nombres, ' ', AP_Paterno, ' ', AP_Materno) AS Alumno 
FROM tb_alumno WHERE Activo = 1;
//

-- #03. SP NEW Alumno
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_alumno (
	IN p_usuario INT,
	IN p_nombres VARCHAR(50),
	IN p_apaterno VARCHAR(20),
	IN p_amaterno VARCHAR(20),
	IN p_direccion VARCHAR(100),
	IN p_email VARCHAR(100),
	IN p_telefono VARCHAR(9),
	IN p_documento VARCHAR(9),
	IN p_sexo VARCHAR(12),
	IN p_ciclo INT,
	IN p_bloque INT
)
BEGIN
	INSERT INTO tb_alumno (IDUsuario, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, CicloActual, BloqueActual, dt_Act)
	VALUES (p_usuario, p_nombres, p_apaterno, p_amaterno, p_direccion, p_email, p_telefono, p_documento, p_sexo, p_ciclo, p_bloque, CURRENT_DATE);
END;
//

-- #04. SP UPD Usuario
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_alumno (
	IN p_usuario INT,
	IN p_nombres VARCHAR(50),
	IN p_apaterno VARCHAR(20),
	IN p_amaterno VARCHAR(20),
	IN p_direccion VARCHAR(100),
	IN p_email VARCHAR(100),
	IN p_telefono VARCHAR(9),
	IN p_documento VARCHAR(9),
	IN p_sexo VARCHAR(12),
	IN p_ciclo INT,
	IN p_bloque INT,
	IN p_id INT
)
BEGIN
	UPDATE tb_alumno SET IDUsuario = p_usuario, Nombres = p_nombres, AP_Paterno = p_apaterno, 
	AP_Materno = p_amaterno, Direccion = p_direccion, Email = p_email, Telefono = p_telefono, 
	DocumentoIdent = p_documento, Sexo = p_sexo, CicloActual = p_ciclo, BloqueActual = p_bloque, 
	dt_Act = CURRENT_DATE
	WHERE IDAlumno = p_id;
END;
// 

-- #05. SP DEL Alumno
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_alumno
(
	IN p_id INT
)
BEGIN
	UPDATE tb_alumno SET Activo = 0, dt_Act = CURRENT_DATE
	WHERE IDAlumno = p_id;
END;
//

-- #06. SP BY Alumno
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_by_alumno
(
	IN p_id INT
)
BEGIN
	SELECT A.IDAlumno, U.IDUsuario, U.Username, A.Nombres, A.AP_Paterno, A.AP_Materno, A.Direccion, A.Email, A.Telefono, A.DocumentoIdent, A.Sexo, A.CicloActual, A.BloqueActual
	FROM tb_alumno A INNER JOIN tb_usuario U ON U.IDUsuario = A.IDUsuario WHERE A.IDAlumno = p_id;
END;
//

-- STORED PROCEDURES · Docente
-- #01. VW ADM Docente
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_docente AS 
	SELECT IDDocente, IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Creacion, dt_Act 
	FROM tb_docente 
	WHERE Activo = 1;
// 

-- #02. VW ENUM Docente
DELIMITER //
CREATE OR REPLACE VIEW vw_enum_docente AS
	SELECT IDDocente, CONCAT(Nombres, ' ', AP_Paterno, ' ', AP_Materno) AS Docente 
	FROM tb_docente WHERE Activo = 1;
//

-- #03. SP NEW Docente
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_docente (
	IN p_usuario INT,
	IN p_nombres VARCHAR(50),
	IN p_apaterno VARCHAR(20),
	IN p_amaterno VARCHAR(20),
	IN p_direccion VARCHAR(100),
	IN p_email VARCHAR(100),
	IN p_telefono CHAR(9),
	IN p_documento CHAR(9),
	IN p_sexo VARCHAR(12)
)
BEGIN
	INSERT INTO tb_docente (IDCuenta, Nombres, AP_Paterno, AP_Materno, Direccion, Email, Telefono, DocumentoIdent, Sexo, dt_Act)
	VALUES (p_usuario, p_nombres, p_apaterno, p_amaterno, p_direccion, p_email, p_telefono, p_documento, p_sexo, CURRENT_DATE);
END;
//

-- #04. SP UPD Docente
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_docente (
	IN p_usuario INT,
	IN p_nombres VARCHAR(50),
	IN p_apaterno VARCHAR(20),
	IN p_amaterno VARCHAR(20),
	IN p_direccion VARCHAR(100),
	IN p_email VARCHAR(100),
	IN p_telefono CHAR(9),
	IN p_documento CHAR(9),
	IN p_sexo VARCHAR(12),
	IN p_id INT
)
BEGIN
	UPDATE tb_docente SET IDCuenta = p_usuario, Nombres = p_nombres, AP_Paterno = p_apaterno, 
	AP_Materno = p_amaterno, Direccion = p_direccion, Email = p_email, Telefono = p_telefono, 
	DocumentoIdent = p_documento, Sexo = p_sexo, dt_Act = CURRENT_DATE
	WHERE IDDocente = p_id;
END;
// 

-- #05. SP DEL Docente
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_docente
(
	IN p_id INT
)
BEGIN
	UPDATE tb_docente SET Activo = 0, dt_Act = CURRENT_DATE
	WHERE IDDocente = p_id;
END;
//

-- #06. SP BY Docente
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_by_docente
(
	IN p_id INT
)
BEGIN
	SELECT D.IDDocente, D.IDCuenta, U.Username, D.Nombres, D.AP_Paterno, D.AP_Materno, D.Direccion, D.Email, D.Telefono, D.DocumentoIdent, D.Sexo
	FROM tb_docente D INNER JOIN tb_usuario U ON U.IDUsuario = D.IDCuenta WHERE D.IDDocente = p_id;
END;
//

-- STORED PROCEDURES · Asignaturas
-- #00. VW ADM Asignatura
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_asignatura AS
	SELECT A.IDAsignatura, BA.Seccion, A.Clase, C.Nombre AS Curso, CONCAT(D.Nombres, ' ', D.AP_Paterno, ' ', D.AP_Materno) AS Docente 
	FROM tb_asignatura A 
	INNER JOIN tb_bloqueasign BA ON BA.IDBloque = A.IDBloque
	INNER JOIN tb_curso C ON C.IDCurso = A.IDCurso
	INNER JOIN tb_docente D ON D.IDDocente = A.IDDocente 
	WHERE A.Activo = 1;
//

-- #01. SP ENUM Asignatura Bloque (IDBloque)
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_enum_asignatura_bloque 
(
	IN p_bloque INT
)
BEGIN
	SELECT A.IDAsignatura, BA.Seccion, A.Clase, C.Nombre AS Curso, CONCAT(D.Nombres, ' ', D.AP_Paterno, ' ', D.AP_Materno) AS Docente 
	FROM tb_asignatura A 
	INNER JOIN tb_bloqueasign BA ON BA.IDBloque = A.IDBloque
	INNER JOIN tb_curso C ON C.IDCurso = A.IDCurso
	INNER JOIN tb_docente D ON D.IDDocente = A.IDDocente 
	WHERE A.IDBloque = p_bloque AND A.Activo = 1;
END;
//

-- #02. SP ENUM Asignatura Alumno Conc ()
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_enum_asignatura_alumno_con 
(
	IN p_alumno INT
)
BEGIN
    SELECT A.IDAsignatura, BA.Seccion, A.Clase, C.Nombre AS Curso, CONCAT(D.Nombres, ' ', D.AP_Paterno, ' ', D.AP_Materno) AS Docente
    FROM TB_Asignatura A
    INNER JOIN TB_BloqueAsign BA ON A.IDBloque = BA.IDBloque
    INNER JOIN TB_Curso C ON A.IDCurso = C.IDCurso
    INNER JOIN TB_Docente D ON A.IDDocente = D.IDDocente
    WHERE A.IDBloque = (SELECT BloqueActual FROM tb_alumno WHERE IDAlumno = p_alumno) 
    AND BA.Concluido = 1 
    AND A.Activo = 1;
END;
//

-- #03. SP ENUM Asignatura Alumno Acti
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_enum_asignatura_alumno_act
(
	IN p_alumno INT
)
BEGIN
    SELECT A.IDAsignatura, BA.Seccion, A.Clase, C.Nombre AS Curso, CONCAT(D.Nombres, ' ', D.AP_Paterno, ' ', D.AP_Materno) AS Docente
    FROM TB_Asignatura A
    INNER JOIN TB_BloqueAsign BA ON A.IDBloque = BA.IDBloque
    INNER JOIN TB_Curso C ON A.IDCurso = C.IDCurso
    INNER JOIN TB_Docente D ON A.IDDocente = D.IDDocente
    WHERE A.IDBloque = (SELECT BloqueActual FROM tb_alumno WHERE IDAlumno = p_alumno) 
    AND BA.Concluido = 0 
    AND A.Activo = 1;
END;
//

-- #05. SP NEW Asignatura
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_asignatura 
(
	IN p_bloque INT,
	IN p_curso INT,
	IN p_docente INT,
	IN p_clase CHAR(8)
)
BEGIN
	INSERT INTO tb_asignatura (IDBloque, IDCurso, IDDocente, Clase, dt_Act)
	VALUES (p_bloque, p_curso, p_docente, p_clase, CURRENT_DATE);
END;
//

-- #06. SP UPD Asignatura
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_asignatura 
(
	IN p_bloque INT,
	IN p_curso INT,
	IN p_docente INT,
	IN p_clase CHAR(8),
	IN p_id INT
)
BEGIN
	UPDATE tb_asignatura SET IDBloque = p_bloque, IDCurso = p_curso, 
	IDDocente = p_docente, Clase = p_clase, dt_Act = CURRENT_DATE
	WHERE IDAsignatura = p_id;
END;
//

-- #07. SP DEL Asignatura
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_asignatura
(
	IN p_id INT
)
BEGIN
	UPDATE tb_asignatura SET Activo = 0, dt_Act = CURRENT_DATE
	WHERE IDAsignatura = p_id;
END;
//

-- #08. SP BY Asignatura
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_by_asignatura
(
	IN p_id INT
)
BEGIN
	SELECT A.IDAsignatura, A.IDBloque, BA.IDCarrera, CA.Nombre as Carrera, BA.Seccion, A.Clase, A.IDCurso, C.Nombre AS Curso, A.IDDocente, CONCAT(D.Nombres, ' ', D.AP_Paterno, ' ', D.AP_Materno) AS Docente 
	FROM tb_asignatura A 
	INNER JOIN tb_bloqueasign BA ON BA.IDBloque = A.IDBloque
	INNER JOIN tb_curso C ON C.IDCurso = A.IDCurso
	INNER JOIN tb_docente D ON D.IDDocente = A.IDDocente 
	INNER JOIN tb_carrera CA ON BA.IDCarrera = CA.IDCarrera
	WHERE A.IDAsignatura = p_id;
END;
//

-- STORED PROCEDURES · Matricula
-- #00. VW ADM Matricula
DELIMITER //
CREATE OR REPLACE VIEW vw_adm_matricula AS
	SELECT M.IDMatricula, C.Nombre AS Carrera, BA.Seccion AS Bloque, 
	CONCAT(Nombres, ' ', A.AP_Paterno, ' ', A.AP_Materno) AS Alumno, 
	M.dt_Act
	FROM tb_matricula M
	INNER JOIN tb_alumno A ON A.IDAlumno = M.IDAlumno
	INNER JOIN tb_bloqueasign BA ON BA.IDBloque = M.IDBloque 
	INNER JOIN tb_carrera C ON C.IDCarrera = BA.IDCarrera
	WHERE M.Activo = 1;
//

-- #01. SP ENUM Matricula Alumno
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_enum_matricula_alumno 
(
	IN p_bloque INT
)
BEGIN
	SELECT CONCAT(Nombres, ' ', A.AP_Paterno, ' ', A.AP_Materno) AS Alumno,
	M.dt_Act
	FROM tb_matricula M 
	INNER JOIN tb_alumno A ON A.IDAlumno = M.IDAlumno
	WHERE M.IDBloque = p_bloque;
END;
//

-- #02. SP NEW Matricula
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_new_matricula 
(
	IN p_bloque INT,
	IN p_alumno INT
)
BEGIN 
	INSERT INTO tb_matricula (IDBloque, IDAlumno, dt_Act) 
	VALUES (p_bloque, p_alumno, CURRENT_DATE);
END;
//

-- #03. SP UPD Matricula
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_upd_matricula 
(
	IN p_bloque INT,
	IN p_alumno INT,
	IN p_id INT
)
BEGIN
	UPDATE tb_matricula SET IDBloque = p_bloque, IDAlumno = p_alumno, 
    dt_Act = CURRENT_DATE 
	WHERE IDMatricula = p_id;
END;
//

-- #04. SP DEL Matricula
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_del_matricula
(
	IN p_id INT
)
BEGIN 
	UPDATE tb_matricula SET Activo = 0, dt_Act = CURRENT_DATE
	WHERE IDMatricula = p_id;
END;
//

-- #05. SP BY Matricula 
DELIMITER //
CREATE OR REPLACE PROCEDURE sp_by_matricula
(
	IN p_id INT
)
BEGIN
	SELECT M.IDMatricula, C.IDCarrera, C.Nombre as Carrera, M.IDBloque, M.IDAlumno
	FROM tb_matricula M
	INNER JOIN tb_bloqueasign BA ON BA.IDBloque = M.IDBloque
	INNER JOIN tb_carrera C ON C.IDCarrera = BA.IDCarrera
	WHERE IDMatricula = p_id;
END;
//
