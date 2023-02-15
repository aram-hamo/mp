if('serviceWorker' in navigator){
  navigator.serviceWorker.register("worker.js")
  .catch((err) => console.log('ERROR: '+err))
}
