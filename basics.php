<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://unpkg.com/vue"></script>
	<script type="text/javascript" src="https://unpkg.com/vuex"></script>
</head>
<body>
	<div id="app">
		<h1>{{welcome}}</h1>
		<h2>{{message}}</h2>
		<h3>{{count}}</h3>
		<button @click="pressed">Increment Counter</button>
	</div>
	<script>
		const store = new Vuex.Store({
			state : {
				message: 'Hello From Vuex',
				count: 0
			},
			mutations: { //synchronous
				increment(state, payload) {
					state.count += payload;
				}
			},
			actions: { //aynschronous
				increment(state, payload) {
					state.commit('increment', payload);
				}
			},
			getters: {
				message(state) {
					return state.message.toUpperCase();
				},
				counter(state) {
					return state.count;
				}
			}
		});
		new Vue({
			el: '#app',
			data() {
				return {
					welcome: 'Hello World!'
				}
			},
			computed: {
				message() {
					return store.getters.message;
				},
				count() {
					return store.getters.counter;
				}
			},
			methods: {
				pressed() {
					store.dispatch('increment', 20)
				}
			}
		});
	</script>
</body>
</html>
</html>