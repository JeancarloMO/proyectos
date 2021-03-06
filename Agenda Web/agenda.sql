USE [actividades]
GO
/****** Object:  Table [dbo].[actividades]    Script Date: 27/12/2019 21:41:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[actividades](
	[cod_actividad] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](500) NULL,
	[area] [varchar](100) NULL,
	[inicio] [date] NULL,
	[fin] [date] NULL,
	[estado] [int] NULL,
	[entrega] [date] NULL,
	[usuario] [varchar](30) NULL,
	[responsable] [varchar](30) NULL,
	[finalizacion] [int] NULL,
	[obs] [varchar](1000) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[oficios]    Script Date: 27/12/2019 21:41:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[oficios](
	[cod_oficio] [int] IDENTITY(1,1) NOT NULL,
	[codigo] [varchar](10) NULL,
	[asunto] [varchar](500) NULL,
	[area_remitente] [varchar](100) NULL,
	[area_recepciona] [varchar](100) NULL,
	[fecha] [date] NULL,
	[estado] [int] NULL,
	[usuario_modifica] [varchar](30) NOT NULL,
	[fecha_modifica] [datetime] NOT NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 27/12/2019 21:41:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[usuario](
	[cod_usuario] [int] NULL,
	[usuario] [varchar](30) NULL,
	[clave] [varchar](30) NULL,
	[nombres] [varchar](50) NULL,
	[apellidos] [varchar](50) NULL,
	[correo] [varchar](50) NULL,
	[estado] [int] NULL,
	[tipo] [varchar](50) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[actividades] ON 

INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1, N'seleccionar los desechos del almacén', N'pabellon b', CAST(N'2019-10-03' AS Date), CAST(N'2019-10-03' AS Date), 0, CAST(N'2019-10-03' AS Date), N'eguillen', N'eguillen', 1, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2, N'verificar los  ecran de los pabellones A, B y C
', N'pabellón A, B y C', CAST(N'2019-10-03' AS Date), CAST(N'2019-10-03' AS Date), 0, CAST(N'2019-10-17' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (3, N'seleccionar los desechos del almacén', N'pabellon B', CAST(N'2019-10-03' AS Date), CAST(N'1900-01-01' AS Date), 0, CAST(N'2019-10-17' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (4, N'Instalación del SQL Server', N'Laboratorio de Idiomas', CAST(N'2019-10-03' AS Date), CAST(N'2019-10-03' AS Date), 0, CAST(N'2019-10-03' AS Date), N'kmazuelos', N'kmazuelos', 0, N'Se inicio actualizando 12 Only One dentro del sistema Update para cargar todas sus características. Al terminar de actualizar se paso a cada maquina el SQL Server 2008, se inicio la instalación y se termino de instalar en las 12 computadoras el SQL Server. Las 11 primeras maquinas del centro y del profesor. ')
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (5, N'Manual de Asistencia:
Manual de registro y reporte
Manual Maestro Administrador
Vídeo de Uso', N'Oficina de Sistemas', CAST(N'2019-10-04' AS Date), CAST(N'1900-01-01' AS Date), 1, NULL, N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (6, N'selección de desechos y  en la oficina de sistemas ', N'oficina de sistemas', CAST(N'2019-10-04' AS Date), CAST(N'2019-10-04' AS Date), 0, CAST(N'2019-10-17' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (7, N'seleccionar los desechos de la oficina de sistemas', N'oficina de sistemas', CAST(N'2019-10-04' AS Date), CAST(N'2019-10-04' AS Date), 0, CAST(N'2019-10-04' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (8, N'Aumentar la capacidad a 10MB para subir archivos en el aula virtual', N'sistemas', CAST(N'2019-10-07' AS Date), CAST(N'2019-10-09' AS Date), 0, CAST(N'2019-10-09' AS Date), N'ebazalar', N'gmedina', 1, N'')
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (9, N'Verificar el proceso de dos mallas', N'registros', CAST(N'2019-10-07' AS Date), CAST(N'2019-10-11' AS Date), 0, CAST(N'2019-10-31' AS Date), N'ebazalar', N'hbueno', 0, N'')
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (10, N'Subir los manuales a Aula virtual', N'Sistemas', CAST(N'2019-10-07' AS Date), CAST(N'2019-10-11' AS Date), 0, CAST(N'2019-10-09' AS Date), N'ebazalar', N'gmedina', 0, N'')
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (11, N'Informe del los desechos RAEE y el Almacen RAEE, inventario de equipos y accesorios para dar de baja', N'Residuos Electronicos', CAST(N'2019-10-02' AS Date), CAST(N'2019-10-07' AS Date), 0, CAST(N'2019-10-17' AS Date), N'ebazalar', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (12, N'Solicitar Manuales del repositorio', N'Investigacion', CAST(N'2019-10-04' AS Date), CAST(N'2019-10-07' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (13, N'Volver a solicitar manuales de Contabilidad', N'Sistemas', CAST(N'2019-10-04' AS Date), CAST(N'2019-10-11' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (14, N'Realizar un manual Rapido de Combalidaciones', N'Sistemas', CAST(N'2019-10-04' AS Date), CAST(N'2019-10-11' AS Date), 1, NULL, N'ebazalar', N'hbueno', 0, N'No quiero')
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (15, N'Manuales Actualizados', N'Sistemas', CAST(N'2019-10-07' AS Date), CAST(N'2019-10-11' AS Date), 0, CAST(N'2019-10-11' AS Date), N'ebazalar', N'gmedina', 0, N'falta agregar algunos pasos en las guías rápidas del aula virtual.')
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (16, N'cambios en el perfil docente', N'Sistemas', CAST(N'2019-10-07' AS Date), CAST(N'2019-10-09' AS Date), 0, CAST(N'2019-10-10' AS Date), N'ebazalar', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (17, N'Buscar la Forma de solucionar el tema del koha cuando se va la electricidad', N'BIBLIOTECA', CAST(N'2019-10-04' AS Date), CAST(N'2019-10-07' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (18, N'Se arreglo el sistema de las pc del laboratorio de sistema', N'Lab. de sistemas', CAST(N'2019-10-07' AS Date), CAST(N'1900-01-01' AS Date), 0, CAST(N'2019-10-07' AS Date), N'kmazuelos', N'kmazuelos', 1, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (19, N'Llenar todos los datos de oficio emitidos a un Excel', N'Oficina de sistemas', CAST(N'2019-10-09' AS Date), CAST(N'1900-01-01' AS Date), 0, CAST(N'2019-11-06' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (20, N'REPARANDO UNA PC DE AULA', N'PABELLON B', CAST(N'2019-10-09' AS Date), CAST(N'2019-10-09' AS Date), 0, CAST(N'2019-10-09' AS Date), N'eguillen', N'eguillen', 1, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (21, N'REPARANDO LUCES DE EMERGENCIA', N'PABELLONES', CAST(N'2019-10-09' AS Date), CAST(N'2019-10-14' AS Date), 0, CAST(N'2019-10-17' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (22, N'Cambiar de CPU en el salón 401B ', N'Salón 104B', CAST(N'2019-10-09' AS Date), CAST(N'2019-10-09' AS Date), 0, CAST(N'2019-10-23' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (23, N'selección e inventariado de los teclados, mouse, y otros placas de cpu', N'oficina de sistemas', CAST(N'2019-10-08' AS Date), CAST(N'2019-10-08' AS Date), 0, CAST(N'2019-10-17' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (24, N'registrar en excel los oficios recibidos de los años 2018 y 2019', N'oficina de sistemas', CAST(N'2019-10-09' AS Date), CAST(N'2019-10-09' AS Date), 0, CAST(N'2019-10-17' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (25, N'Reporte de Asistencia de llenado de asistencia de docentes', N'OIS', CAST(N'2019-10-10' AS Date), CAST(N'2019-10-10' AS Date), 0, CAST(N'2019-10-15' AS Date), N'hbueno', N'hbueno', 0, N'Se lo envié a su correo')
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (26, N'reparar y formatear una pc all and one', N'investigacion ', CAST(N'2019-10-10' AS Date), CAST(N'2019-10-10' AS Date), 0, CAST(N'2019-10-10' AS Date), N'eguillen', N'eguillen', 1, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (27, N'traslado de los desechos electrónico a los almacenes', N'oficina de sistemas', CAST(N'2019-10-10' AS Date), CAST(N'2019-10-10' AS Date), 0, CAST(N'2019-10-10' AS Date), N'eguillen', N'eguillen', 1, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (28, N'traslado de desechos electrónicos de la oficina de Sistemas al almacén del pabellón B', N'oficina de sistemas', CAST(N'2019-10-10' AS Date), CAST(N'2019-10-10' AS Date), 0, CAST(N'2019-10-17' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (29, N'capacitación de primeros auxilios', N'bienestar', CAST(N'2019-10-11' AS Date), CAST(N'2019-10-11' AS Date), 0, CAST(N'2019-10-11' AS Date), N'eguillen', N'eguillen', 1, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (30, N'reparacion de all and one', N'decanatura de ingenieria', CAST(N'2019-10-11' AS Date), CAST(N'2019-10-11' AS Date), 0, CAST(N'2019-10-11' AS Date), N'eguillen', N'eguillen', 1, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (31, N'capacitación de Bomberos
1- manejo de extintores
2- primeros auxilios
3- evacuación de emergencias

cableado, instalación y configuración de un punto de Internet en la entrada (costado de la caseta de seguridad)', N'usdg', CAST(N'2019-10-11' AS Date), CAST(N'2019-10-11' AS Date), 0, CAST(N'2019-10-18' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (32, N'Carga de no lectiva de docentes tiempo completos', N'VRAC', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-18' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (33, N'Verificar las estadisticas de sistema Koha', N'bilbioteca', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-21' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (34, N'REporte de silabos Faltantes del 2019-II', N'VRAC', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-18' AS Date), 1, NULL, N'ebazalar', N'gmedina', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (35, N'Verificar la evaluacion docente y verificar las notas ', N'Sistemas', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-23' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (36, N'Cambiar la estructura de los perfiles, Docente, Administrativo, alumno', N'SISTEMAS', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-24' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (37, N'Manual para poner un usuario administrador a todas las compuadoras de la universidad', N'Sistemas', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-18' AS Date), 0, CAST(N'2019-10-24' AS Date), N'ebazalar', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (38, N'averiguar sobre tutoria  por el aula vistual', N'Sistemas', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-28' AS Date), 1, NULL, N'ebazalar', N'ebazalar', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (39, N'Fotos de los docentes para subir al Siga', N'Sistemas', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-23' AS Date), 1, NULL, N'ebazalar', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (40, N'Cambio del Procedimiento almacenado que muestra los horarios en el siga (intranet)
en el perfil docente
', N'OIS', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-14' AS Date), 0, CAST(N'2019-10-15' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (41, N'Se adiciono el horario a la carpeta virtual docente al componente administrativo en el perfil docente', N'OIS', CAST(N'2019-10-14' AS Date), CAST(N'2019-10-14' AS Date), 0, CAST(N'2019-10-15' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (42, N'Se agrego, al perfil alumno,  la opción de que llene la encuesta, bloqueando las demás opciones en el intranet', N'OIS', CAST(N'2019-10-15' AS Date), CAST(N'2019-10-15' AS Date), 0, CAST(N'2019-10-15' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (43, N'Mapa de red, con ip, usuario y contraseña', N'OIS', CAST(N'2019-10-16' AS Date), CAST(N'2019-10-18' AS Date), 0, CAST(N'2019-10-31' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (44, N'Informe de la instalacion de sql server que se instalaron en el laboratorio de computo e idioma', N'Oficina de sistemas', CAST(N'2019-10-15' AS Date), CAST(N'2019-10-15' AS Date), 0, CAST(N'2019-10-16' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (45, N'se ordeno todas las computadoras con sus respectivas mesas y sacar 4 computadoras del laboratorio de computo según el aforo permitido ', N'Laboratorio de computo', CAST(N'2019-10-15' AS Date), CAST(N'2019-10-15' AS Date), 0, CAST(N'2019-10-16' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (46, N'Manual de sql server de los procedimientos almacenados del la base de datos USDG', N'Oficina de SIstemas', CAST(N'2019-10-15' AS Date), CAST(N'1900-01-01' AS Date), 1, NULL, N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (47, N'se des instalo el SQL Server 2014 a 10 computadoras para que permanezcan solo 12 computadoras ', N'Laboratorio de computo', CAST(N'2019-10-16' AS Date), CAST(N'1900-01-01' AS Date), 0, CAST(N'2019-10-16' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (48, N'Se instalo una pizarra didactica ', N'oficina de Calidad', CAST(N'2019-10-16' AS Date), CAST(N'1900-01-01' AS Date), 0, CAST(N'2019-10-16' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (49, N'configuración de la pizarra inteligente', N'calidad', CAST(N'2019-10-16' AS Date), CAST(N'2019-10-16' AS Date), 0, CAST(N'2019-10-17' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (50, N'descargar vídeos de manual de starsoft contabilidad', N'gerencia', CAST(N'2019-10-17' AS Date), CAST(N'2019-10-17' AS Date), 0, CAST(N'2019-10-17' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (51, N'Instalación de una pizarra inteligente ', N'Calidad', CAST(N'2019-10-16' AS Date), CAST(N'2019-10-16' AS Date), 0, CAST(N'2019-10-23' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (52, N'Se quito opciones del menú de el Intranet en el perfil alumno y docente.
Alumno: Mis archivos y foto.
Docente: Manual de usuario, misión y visión, carpetas de clase y foro.', N'OIS', CAST(N'2019-10-17' AS Date), CAST(N'2019-10-17' AS Date), 0, CAST(N'2019-10-17' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (53, N'revisión de la pc del salón 202 pabellón A, cambio del disco duro, formateo e instalaciones de programas', N'área de sistemas', CAST(N'2019-10-17' AS Date), CAST(N'2019-10-17' AS Date), 0, CAST(N'2019-10-23' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (54, N'revisión de las PC de lo salones 401 y 402 del pabellón A, formateo e instalaciones de programas de la pc del salón 401 del pabellón A', N'área de sistemas', CAST(N'2019-10-18' AS Date), CAST(N'2019-10-18' AS Date), 0, CAST(N'2019-10-23' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (55, N'verificación del inventario de los desechos electrónicos 
', N'área de sistemas', CAST(N'2019-10-15' AS Date), CAST(N'2019-10-15' AS Date), 0, CAST(N'2019-10-28' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (56, N'colocacion de una antena en el techo de la oficina de sistemas; se saco el sable del pabellón B (azotea) y se hizo pruebas en el área de bienestar y pabellón C', N'usdg', CAST(N'2019-10-21' AS Date), CAST(N'2019-10-21' AS Date), 0, CAST(N'2019-10-28' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (57, N'limpieza y ,mantenimiento de las antenas,', N'Oficina de sistemas', CAST(N'2019-10-22' AS Date), CAST(N'2019-10-22' AS Date), 0, CAST(N'2019-10-28' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (58, N'Colgar una antena ', N'Edificio de Administracion', CAST(N'2019-10-21' AS Date), CAST(N'2019-10-21' AS Date), 0, CAST(N'2019-10-23' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (59, N'dar mantenimiento de las antenas ', N'Oficina de Sistemas', CAST(N'2019-10-21' AS Date), CAST(N'2019-10-21' AS Date), 0, CAST(N'2019-10-23' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1056, N'se bajo los sables del techo de la oficina de sistemas y del pabellón A ', N'USDG', CAST(N'2019-10-24' AS Date), CAST(N'2019-10-24' AS Date), 0, CAST(N'2019-10-28' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1057, N'se puso canaletas en el tópico y el la oficina de decanatura de educación;
se reviso las cámaras de seguridad y se les asigno el nombre respectivo de su ubicación ', N'USDG', CAST(N'2019-10-25' AS Date), CAST(N'2019-10-25' AS Date), 0, CAST(N'2019-10-28' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1058, N'bbbb', N'fffff', CAST(N'2019-10-28' AS Date), CAST(N'2019-10-28' AS Date), 1, NULL, N'gmedina', N'gmedina', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1059, N'formateo de tres pc´s de sala de docentes ', N'sala de docentes', CAST(N'2019-10-28' AS Date), CAST(N'2019-10-28' AS Date), 0, CAST(N'2019-11-06' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1060, N'poner canaleta al switch en la sala de docentes y completar la pc que faltaba,

cambio de pila a la pc de la biblioteca y actualización del office 2013,
', N'USDG', CAST(N'2019-10-29' AS Date), CAST(N'2019-10-29' AS Date), 0, CAST(N'2019-11-06' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1061, N'Configuración del Access Point + Antena Omni direccional en Tópico', N'OIS', CAST(N'2019-10-22' AS Date), CAST(N'1900-01-01' AS Date), 0, CAST(N'2019-10-31' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1062, N'configuración de ip estática a bienestar, tópico, servicio social y psicopedagogia', N'OIS', CAST(N'2019-10-24' AS Date), CAST(N'1900-01-01' AS Date), 0, CAST(N'2019-10-31' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1063, N'desarrollo sistema de registro de equipos', N'OIS', CAST(N'2019-10-25' AS Date), CAST(N'2019-10-30' AS Date), 0, CAST(N'2019-10-31' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1067, N'preparación de una computadora completa ', N'calidad', CAST(N'2019-11-05' AS Date), CAST(N'2019-11-05' AS Date), 0, CAST(N'2019-11-05' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1068, N'Levantamiento y configuración de los equipos Airtux AT-AG30 para la zona wifi de la biblioteca (exterior)', N'OIS', CAST(N'2019-11-05' AS Date), CAST(N'2019-11-05' AS Date), 0, CAST(N'2019-11-05' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1069, N'limpieza y mantenimiento del switch en el área de sistemas,
formateo de una Pc Oli One y aumento de la memoria ram', N'área de sistemas', CAST(N'2019-11-04' AS Date), CAST(N'2019-11-04' AS Date), 0, CAST(N'2019-11-06' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1070, N'Cambiar el switf', N'Pabellon C', CAST(N'2019-11-07' AS Date), CAST(N'2019-11-07' AS Date), 0, CAST(N'2019-11-06' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1071, N'cambiando el router', N'Pabellon C', CAST(N'2019-11-06' AS Date), CAST(N'2019-11-06' AS Date), 0, CAST(N'2019-11-06' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1072, N'cableado swich principal de usdg


acomodar los cables del suelo con canaletas', N'área de sistemas', CAST(N'2019-11-05' AS Date), CAST(N'2019-11-05' AS Date), 0, CAST(N'2019-11-06' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1073, N'actualizar las licencia del deefrezer y instalar el office', N'pabellon B', CAST(N'2019-11-06' AS Date), CAST(N'2019-11-06' AS Date), 0, CAST(N'2019-11-06' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1074, N'instalación de la zona de wifi de la biblioteca

instalación del defrezer en la sala de computo', N'pabellon B', CAST(N'2019-11-06' AS Date), CAST(N'2019-11-06' AS Date), 0, CAST(N'2019-11-06' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1075, N'cambie pantalla rota', N'vicerrectorado académico', CAST(N'2019-11-07' AS Date), CAST(N'2019-11-07' AS Date), 0, CAST(N'2019-11-07' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1076, N'repare teléfono ip ', N'seguridad', CAST(N'2019-11-07' AS Date), CAST(N'2019-11-07' AS Date), 0, CAST(N'2019-11-07' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1077, N'repare archivos ', N'vicerrectorado académico', CAST(N'2019-11-07' AS Date), CAST(N'2019-11-07' AS Date), 0, CAST(N'2019-11-07' AS Date), N'eguillen', N'eguillen', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1078, N'Arreglar los cables enredados de la computadora y router', N'Biblioteca', CAST(N'2019-11-08' AS Date), CAST(N'2019-11-08' AS Date), 0, CAST(N'2019-11-08' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1079, N'verificar todas las computadoras si están funcionando y actualizar el antivirus', N'Laboratorios', CAST(N'2019-11-08' AS Date), CAST(N'2019-11-08' AS Date), 0, CAST(N'2019-11-08' AS Date), N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1080, N'Colgar las características a la pagina de todas las PC', N'Salones Pabellon B', CAST(N'2019-11-08' AS Date), CAST(N'2019-11-08' AS Date), 1, NULL, N'kmazuelos', N'kmazuelos', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2069, N'ir a comprar canaletas 

poner canaletas a los salones del  pabellón A

poner canaleta en el área de admisión 

revisar los laboratorios de idiomas y simulación 

poner canaleta en el área de bienestar universitario
', N'usdg', CAST(N'2019-11-11' AS Date), CAST(N'2019-11-11' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2070, N'registrar en el sistema ios.usdg.edu.pe:6565 del laboratorio de computo e idiomas
', N'pabellon B', CAST(N'2019-11-10' AS Date), CAST(N'2019-11-10' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2071, N'verificar los ip y corregir del laboratorio de computo; y programas instalados', N'Pabellón B', CAST(N'2019-11-09' AS Date), CAST(N'2019-11-09' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2072, N'acomodar los cables de todas la pc y equipos de la usdg y poner canaletas en las áreas administrativas', N'USDG', CAST(N'2019-11-12' AS Date), CAST(N'2019-11-12' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2073, N'dar soporte a área administrativo', N'USDG', CAST(N'2019-11-16' AS Date), CAST(N'2019-11-16' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2074, N'primer día de visita de la SUNEDU ', N'usdg', CAST(N'2019-11-13' AS Date), CAST(N'2019-11-13' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2075, N'Segundo día de visita de la SUNEDU', N'USDG', CAST(N'2019-11-14' AS Date), CAST(N'2019-11-14' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (2076, N'Tercer día de Visita de la SUNEDU
', N'USDG', CAST(N'2019-11-15' AS Date), CAST(N'2019-11-15' AS Date), 0, CAST(N'2019-11-19' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1064, N'reporte de CV docente', N'OIS', CAST(N'2019-10-30' AS Date), CAST(N'2019-10-30' AS Date), 0, CAST(N'2019-10-31' AS Date), N'hbueno', N'hbueno', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1065, N'limpieza y mantenimiento del Switch del pabellón A aula 203,

organización de los repuestos de computo, antenas, y otros en la oficina de sistemas', N'oficina de sistemas y pabellón A', CAST(N'2019-10-30' AS Date), CAST(N'2019-10-30' AS Date), 0, CAST(N'2019-11-06' AS Date), N'oparia', N'oparia', 0, NULL)
INSERT [dbo].[actividades] ([cod_actividad], [descripcion], [area], [inicio], [fin], [estado], [entrega], [usuario], [responsable], [finalizacion], [obs]) VALUES (1066, N'poner la terminal coaxial en el sable (2)

instalación del sable y router (zona wifi) en la biblioteca', N'pabellón B y oficina de sistemas', CAST(N'2019-10-31' AS Date), CAST(N'2019-10-31' AS Date), 0, CAST(N'2019-11-06' AS Date), N'oparia', N'oparia', 0, NULL)
SET IDENTITY_INSERT [dbo].[actividades] OFF
SET IDENTITY_INSERT [dbo].[oficios] ON 

INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (1, N'00001', N'asdsad', N'sadsa', N'ddasds', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:35:19.230' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (2, N'0002', N'asas', N'asas', N'as', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:37:43.103' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (3, N'0003', N'sdsd', N'sds', N'sds', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:45:25.507' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (4, N'0003', N'asas', N'asas', N'asa', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:46:19.323' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (5, N'0003', N'asdsad', N'asdas', N'dasd', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:48:47.173' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (6, N'0001', N'asdas', N'sadas', N'dasd', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:49:18.547' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (7, N'0001', N'sadas', N'asdas', N'dasd', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:49:45.930' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (8, N'0001', N'sd', N'asdasd', N'asdas', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 15:50:21.170' AS DateTime))
INSERT [dbo].[oficios] ([cod_oficio], [codigo], [asunto], [area_remitente], [area_recepciona], [fecha], [estado], [usuario_modifica], [fecha_modifica]) VALUES (9, N'0001', N'dsad', N'asdas', N'dasd', CAST(N'2019-12-27' AS Date), 1, N'ebazalar', CAST(N'2019-12-27 16:11:17.583' AS DateTime))
SET IDENTITY_INSERT [dbo].[oficios] OFF
INSERT [dbo].[usuario] ([cod_usuario], [usuario], [clave], [nombres], [apellidos], [correo], [estado], [tipo]) VALUES (1, N'ebazalar', N'Elvi123*', N'ELVI RENEE', N'BAZALAR GANOZA', NULL, 1, N'administrador')
INSERT [dbo].[usuario] ([cod_usuario], [usuario], [clave], [nombres], [apellidos], [correo], [estado], [tipo]) VALUES (2, N'gmedina', N'75141023', N'GIANCARLO', N'MEDINA OROSCO', NULL, 1, N'user')
INSERT [dbo].[usuario] ([cod_usuario], [usuario], [clave], [nombres], [apellidos], [correo], [estado], [tipo]) VALUES (3, N'hbueno', N'1234', N'MAXIMO HUGO', N'BUENO URIBE', NULL, 1, N'user')
INSERT [dbo].[usuario] ([cod_usuario], [usuario], [clave], [nombres], [apellidos], [correo], [estado], [tipo]) VALUES (4, N'kmazuelos', N'74743585', N'KENNETH', N'MAZUELOS VARGAS', NULL, 1, N'user')
INSERT [dbo].[usuario] ([cod_usuario], [usuario], [clave], [nombres], [apellidos], [correo], [estado], [tipo]) VALUES (5, N'oparia', N'43748338', N'ORLANDO', N'PARIA MEJIA', NULL, 1, N'user')
INSERT [dbo].[usuario] ([cod_usuario], [usuario], [clave], [nombres], [apellidos], [correo], [estado], [tipo]) VALUES (6, N'eguillen', N'41939064', N'ERICK', N'GUILLEN DULANTO', NULL, 1, N'user')
/****** Object:  StoredProcedure [dbo].[registrar_actividad]    Script Date: 27/12/2019 21:41:02 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROC [dbo].[registrar_actividad](
@usuario varchar(30),
@descripcion varchar(500),
@area varchar(100),
@inicio date,
@fin date,
@responsable varchar(30)
)AS
INSERT INTO actividades (descripcion, area, inicio, fin, estado, usuario, responsable, finalizacion)
VALUES (@descripcion, @area, @inicio, @fin, '1', @usuario, @responsable, '0');

GO
