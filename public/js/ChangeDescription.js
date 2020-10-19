// noinspection SyntaxError
function changeDescription(){
    const chdescr = document.getElementById("event_id");
    chdescr.addEventListener("onchange", function(){
        const idx = chdescr.options[chdescr.selectedIndex].value;
        const pid = chdescr.options[idx].value;
        alert('changeDescription');
        let currentEvent = jevents.findIndex((event, pid) => event.id == pid);
        let description = jevents[currentEvent].description;
        let descriptionField = document.getElementById("description");
        descriptionField.value = description;
        alert('Descr: ' + descriptionField.value);
    }}
