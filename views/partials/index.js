// Utility Functions
const delay = ms => new Promise(res => setTimeout(res, ms));
const inputsDisabled = state => document.querySelectorAll('button, input, textarea').forEach(el => {el.disabled = state;});
const reload = () => location.reload();
const redirect = to => location.replace(to);
const api = axios.create({
    baseURL: '/',
    headers: {
        'Content-Type': 'application/json'
    },
    validateStatus: () => {
        return true;
    },
});
const formDataToJSON = data => {
    const object = {};
    [...data].map((item) => object[item[0]] = item[1]);
    return object
}
const formHandler = (form, endpoint, captchaRequired = false) => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        const data = formDataToJSON(new FormData(form));
    
        if (captchaRequired && !data['h-captcha-response']) {
            M.toast({html: 'Please complete captcha'});
            return;
        }
    
        inputsDisabled(true);
    
        api.post(endpoint, data).then(response => {
            if (response.data.success) {
                M.Modal.getInstance(form).close();
            }

            M.toast({html: response.data.message});
            inputsDisabled(false);
        });
    });    
}
