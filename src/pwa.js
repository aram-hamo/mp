if('serviceWorker' in navigator){
  navigator.serviceWorker.register(window.location.protocol+'//'+window.location.host+"/worker.js")
  .catch((err) => console.log('ERROR: '+err))
}
