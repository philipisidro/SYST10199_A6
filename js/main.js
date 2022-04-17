const submitButton = document.getElementById('submitBtn');
const viewTableButton = document.getElementById('viewTableBtn');

const insertOpt = document.getElementById('#insert').checked;
const updateOpt = document.getElementById('#updte').checked;
const deleteOpt = document.getElementById('#delete').checked;



submitButton.addEventListener('click', () => {
    if (insertOpt){
        console.log("you going to insert");
    }else if(updateOpt){
        console.log("you going to update");
    }else if(deleteOpt){
        console.log("you going to delete");
    }else {
        console.log("please select an option");
    }
});