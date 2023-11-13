(()=>{"use strict";function t(t,n){var r="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!r){if(Array.isArray(t)||(r=function(t,n){if(!t)return;if("string"==typeof t)return e(t,n);var r=Object.prototype.toString.call(t).slice(8,-1);"Object"===r&&t.constructor&&(r=t.constructor.name);if("Map"===r||"Set"===r)return Array.from(t);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return e(t,n)}(t))||n&&t&&"number"==typeof t.length){r&&(t=r);var i=0,o=function(){};return{s:o,n:function(){return i>=t.length?{done:!0}:{done:!1,value:t[i++]}},e:function(t){throw t},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var s,a=!0,u=!1;return{s:function(){r=r.call(t)},n:function(){var t=r.next();return a=t.done,t},e:function(t){u=!0,s=t},f:function(){try{a||null==r.return||r.return()}finally{if(u)throw s}}}}function e(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}var n=function(t,e,n,r,i,o,s,a){var u,d="function"==typeof t?t.options:t;if(e&&(d.render=e,d.staticRenderFns=n,d._compiled=!0),r&&(d.functional=!0),o&&(d._scopeId="data-v-"+o),s?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},d._ssrRegister=u):i&&(u=a?function(){i.call(this,(d.functional?this.parent:this).$root.$options.shadowRoot)}:i),u)if(d.functional){d._injectStyles=u;var c=d.render;d.render=function(t,e){return u.call(e),c(t,e)}}else{var l=d.beforeCreate;d.beforeCreate=l?[].concat(l,u):[u]}return{exports:t,options:d}}({data:function(){return{items:[],isAdding:!1}},props:{fields:{type:Array,default:function(){return[]},required:!0},added:{type:Array,default:function(){return[]},required:!0}},mounted:function(){if(this.added.length){var e,n=t(this.added);try{for(n.s();!(e=n.n()).done;){var r=e.value;this.items.push(r)}}catch(t){n.e(t)}finally{n.f()}}else this.addRow()},methods:{addRow:function(){this.isAdding=!0;var e,n=t(this.fields);try{for(n.s();!(e=n.n()).done;){var r=e.value;this.items.push(r.replaceAll("__key__",this.items.length))}}catch(t){n.e(t)}finally{n.f()}this.isAdding=!1},deleteRow:function(t){this.items.splice(t,1)},removeSelectedItem:function(){var e,n=t(this.items);try{for(n.s();!(e=n.n()).done;){e.value;this.items.slice(i,1)}}catch(t){n.e(t)}finally{n.f()}}},watch:{items:function(t){t&&this.$nextTick((function(){window.Botble&&(window.Botble.initResources(),window.Botble.initMediaIntegrate()),window.EditorManagement&&(new EditorManagement).init()}))}}},(function(){var t=this,e=t._self._c;return e("div",{staticClass:"repeater-group"},[t._l(t.items,(function(n,r){return e("div",{staticClass:"form-group mb-3"},[e("div",{domProps:{innerHTML:t._s(n)}}),t._v(" "),e("span",{staticClass:"remove-item-button",attrs:{type:"button"},on:{click:function(e){return t.deleteRow(r)}}},[e("i",{staticClass:"fa fa-times"})])])})),t._v(" "),e("button",{class:t.isAdding?"button-loading btn btn-info":"btn btn-info",attrs:{type:"button"},on:{click:t.addRow}},[t._v("\n        "+t._s(t.__("Add new"))+"\n    ")])],2)}),[],!1,null,null,null);const r=n.exports;"undefined"!=typeof vueApp&&vueApp.booting((function(t){t.component("repeater-component",r)}))})();