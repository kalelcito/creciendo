crese
=====

A Symfony project created on October 27, 2016, 3:20 pm.


Observaciones Generales DB y Opciones
=====

Seccion_Contenidos:
    - Tipo: Campo para definir el tipo de contenido con los siguientes valores, dejaremos del 1 al 9 para opciones que
            se puedan manejar con base de datos y del 10 en adelante aplicaciones externas ya definidas como encuesta
            clima laboral, diagnóstico, etc.:
        - 1: Contenido solo texto
        - 2: Contenido solo presentación de ppt
        - 3: Contenido Solo presentacion de video youtube/vimeo
        - 4: Contenido Solo presentacion de video interno
        - 5: Contenido ligado a una encuesta
        - 10: Encuesta auto Diagnóstico
        - 11: Encuesta Clima laboral
        - 12: Encuesta Diagnóstico Prevención incenidos
        - 13: Encuesta Diagnóstico Salud
        - 14: Plan de trabajo
        - 15: Carpeta Virtual
        - 16: Minutas
        - 17: Red Social
        - 18: Programa RFC
        - 19: Programa Talento Laboral Parroquial
        - 20: Enlace a Página Web

Tipos Multimedia
=====
    La tabla multimedia tiene un campo de tipo, ahi vamos a poner que tipo de contenido es de la siguiente forma:
        - 1: Imagen
        - 2: Video Interno
        - 3: Video youtube
        - 4: Video vimeo

Permisos Niveles de membresías
=====

    Los Permisos de los Niveles de membresías los manejamos con un arreglo json, de la siguiente forma:
    {
        // Información general de la cuenta
        cuenta:{
            nivel: 3,  //Nivel de membresía contratado
            max_usuarios: 3  //Número máximo de usuarios
        },
        // Información de las herramientas disponibles, si tienen acceso y usuarios habilitados (solo para encuestas, plan de trabajo y minutas)
        herramientas: {
            10:{     //ID del tipo de herramienta en este caso autodiagnóstico
                cantidad: 3, //Número máximo de encuestas
                usuarios: 10 //Número de usuarios que pueden contestar la encuesta
            },
            11:{     //ID del tipo de herramienta en este caso clima laboral
                cantidad: 3, //Número máximo de encuestas
                usuarios: 10 //Número de usuarios que pueden contestar la encuesta
            },
        },
        // Información de acceso, usuarios y restricciones específicos para la carpeta virutal
        carpetavirtual:{

        },
        // Para la red social, cuando quede terminada
        redsocial:{

        }
    }
    
DB manual
====
    CREATE TABLE boletin (id BIGINT AUTO_INCREMENT NOT NULL, email VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
    ALTER TABLE posts CHANGE contenido contenido VARCHAR(50000) NOT NULL;
    ALTER TABLE reporte_clima CHANGE contenido contenido VARCHAR(50000) DEFAULT NULL;
    ALTER TABLE respuestas CHANGE respuestajson respuestajson VARCHAR(50000) DEFAULT NULL;

