;(function(window) {
    'use strict';

    var CONFIG = {
        debug: false,
        webrtc: {
            answerTimeInterval: 30,
            dialingTimeInterval: 5,
            disconnectTimeInterval: 35,
            statsReportTimeInterval: 5
        }
    };

    var CREDENTIALS = {
        'prod': {
            'appId': 54784,
            'authKey': 'RnA-SgkYJ8UP3GR',
            'authSecret': 'Xw9hEnb7jmw6gKB'
        },
        'test': {
            'appId': 54784,
            'authKey': 'RnA-SgkYJ8UP3GR',
            'authSecret': 'Xw9hEnb7jmw6gKB'
        }
    };

    var MESSAGES = {
        'login': 'Login as any user on this computer and another user on another computer.',
        'create_session': 'Creando una sesión...',
        'connect': 'Conectando...',
        'connect_error': 'Algo salió mal con tu conexión. Revisa tu conexión a internet o la información de usuario e intenta de nuevo.',
        'login_as': 'Nombre de Usuario: ',
        'title_login': 'Escoge un Consultor para conectarte con él:',
        'title_callee': 'Escoge un Consultor:',
        'calling': 'Llamando...',
        'webrtc_not_avaible': 'WebChat no es soportado por tu navegador',
        'no_internet': 'Por favor revisa tu conexión a Internet e intenta de nuevo'
    };

    window.CONFIG = {
        'CREDENTIALS': CREDENTIALS,
        'APP_CONFIG': CONFIG,
        'MESSAGES': MESSAGES
    };
}(window));
