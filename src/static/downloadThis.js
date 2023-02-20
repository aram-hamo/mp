function downloadThis(path){
  caches.open("media")
  .then(cache => {
    cache.add(path)
  });
}
