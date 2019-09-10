import Loading from './components/ayuda/Loading.vue'
//import LoadingBar from './components/ayuda/Bar.vue'
import LoadingBar from './components/loading-bar'
//import Demo from './components/demo.vue'
//import Message from './components/ayuda/message'

const components = {
	Loading
}

const actions = {
	LoadingBar
}

function install(Vue) {
	if(install.installed) return

	for(const item in components) {
		if(components[item].name) {
			Vue.component(components[item].name, components[item])
		}
	}

	//Vue.prototype.$lbar = LoadingBar
	//console.log(LoadingBar);
	//Object.defineProperty(Vue.prototype, '$test', { value: Loading });
	//Vue.prototype.$message = Message
	//Vue.prototype.$http = Http
}

if(typeof window !== 'undefined' && window.Vue) {
	install(window.Vue)
}

export default {
	install,
	...components,
	...actions
}