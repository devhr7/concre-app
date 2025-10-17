import axios from 'axios';

declare global {
	interface Window {
		axios: typeof axios;
	}
}

window.axios = axios;



axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
if (token) {
	axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
}


window.axios.defaults.withCredentials = true;