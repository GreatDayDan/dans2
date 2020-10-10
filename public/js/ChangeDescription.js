function changeDescription(pid){
//use pid to get the description
    alert('changeDescription');
    let currentEvent = jevents.findIndex((event, pid) => event.id == pid);
    let description = jevents[currentEvent].description;
//get the description DOM object
    let descriptionField = document.getElementById("description"); //this assumes the id is description
//change the description
    descriptionField.value = description;
  alert('Descr: ' + descriptionField.value);
}
