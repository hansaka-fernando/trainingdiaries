import{_ as b}from"./ScoreButton.Di04Mqf2.js";import{A as D}from"./App.isxNg9ip.js";import{S as $}from"./Caret.Cuasz9Up.js";import{o as n,c as l,q as p,d as c,y as i,l as m,m as w,a as s,I as M,H as S,t as k,D as g}from"./vue.esm-bundler.DzelZkHk.js";import{_}from"./_plugin-vue_export-helper.BN1snXvA.js";const B={props:{completelyDraggable:{type:Boolean,default(){return!0}}},data(){return{position1:0,position2:0,position3:0,position4:0}},methods:{dragMouseDown(e){e=e||window.event,e.preventDefault(),this.position3=e.clientX,this.position4=e.clientY,document.onmousemove=this.elementDrag,document.onmouseup=this.closeDragElement},elementDrag(e){e=e||window.event,e.preventDefault(),this.position1=this.position3-e.clientX,this.position2=this.position4-e.clientY,this.position3=e.clientX,this.position4=e.clientY,this.$el.style.top=this.$el.offsetTop-this.position2+"px",this.$el.style.left=this.$el.offsetLeft-this.position1+"px"},closeDragElement(){document.onmouseup=null,document.onmousemove=null}}},C={class:"aioseo-draggable"},x={key:1};function A(e,o,t,f,u,a){return n(),l("div",C,[t.completelyDraggable?(n(),l("div",{key:0,"on:dragMouseDown":o[0]||(o[0]=(...r)=>a.dragMouseDown&&a.dragMouseDown(...r))},[p(e.$slots,"default")],32)):c("",!0),t.completelyDraggable?c("",!0):(n(),l("div",x,[p(e.$slots,"default")]))])}const O=_(B,[["render",A]]),E={emits:["update:is-open"],components:{CoreScoreButton:b,PostSettings:D,SvgClose:$,UtilDraggable:O},props:{isOpen:{type:Boolean,default:!1},score:{type:Number,default:0}},data(){return{strings:{header:this.$t.sprintf(this.$t.__("%1$s Settings",this.$td),"AIOSEO")}}},methods:{toggleModal(){this.isOpen=!this.isOpen}}},N={class:"aioseo-pagebuilder-modal-header-title"},P={class:"aioseo-pagebuilder-modal-body edit-post-sidebar"};function I(e,o,t,f,u,a){const r=i("core-score-button"),h=i("svg-close"),v=i("PostSettings"),y=i("util-draggable");return n(),m(y,{ref:"modal-container",completelyDraggable:!1},{default:w(()=>[s("div",{class:M(["aioseo-pagebuilder-modal",{"aioseo-pagebuilder-modal-is-closed":!t.isOpen}])},[s("div",{class:"aioseo-pagebuilder-modal-header",onMousedown:o[1]||(o[1]=S(d=>e.$refs["modal-container"].dragMouseDown(d),["prevent"]))},[s("div",N,k(u.strings.header),1),t.score?(n(),m(r,{key:0,score:t.score,class:"aioseo-score-button--active"},null,8,["score"])):c("",!0),s("div",{class:"aioseo-pagebuilder-modal-header-close",onClick:o[0]||(o[0]=d=>e.$emit("update:is-open",!1))},[g(h)])],32),s("div",P,[g(v)])],2)]),_:1},512)}const q=_(E,[["render",I],["__scopeId","data-v-4b3f6897"]]);export{q as M};
