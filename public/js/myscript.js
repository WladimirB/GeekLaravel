console.log('myscript success');

async function deleteItem(url){
  let e = event.target;
  if(e.tagName == 'A' && e.dataset.id !== undefined)
  {
   let request = new FormData();
   ///request.append('id',e.dataset.id);
   request.append('_token',e.dataset.safe);
   request.append('_method','DELETE');

   let response = await fetch(`${url}`,{
     method:"POST",
     body:request
   });

   let result = await response.text();
   console.log(result);
   if(result === 'Ok'){
    location.reload();
   }
  }
  else {
    return;
  }
}
