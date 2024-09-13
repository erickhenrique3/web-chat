import axios from "axios";
window.axios = axios


// Supondo que você já tenha o token XSRF armazenado em uma variável global
axios.defaults.headers.common['X-XSRF-TOKEN'] = window.csrfToken;

// Ou se você estiver configurando o axios diretamente
axios.create({
    headers: {
        'X-XSRF-TOKEN': window.csrfToken,
    },
});

import './echo';  



