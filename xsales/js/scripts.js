function showMypass(){
  var x = document.getElementById('pwd');
  if(x.type === "password"){
    x.type = "text";
  }
  else{
    x.type = "password";
  }
}


var loadFile = function(event){
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
  };


function viewSubCat(){
    var cat = document.forms['sentMessage']['cat'].value;

    var elect = document.getElementById('forElectronics');
    var furn = document.getElementById('forFurniture');
    var mar = document.getElementById('forMarbles');
    var wears = document.getElementById('forWears');

    var electSel = document.getElementById('electSel');
    var furSel = document.getElementById('furSel');
    var marSel = document.getElementById('marSel');
    var wearsSel = document.getElementById('wearsSel');

  if(cat == "Electronics"){
    elect.style.display = "block";
    furn.style.display = "none";
    mar.style.display = "none";
    wears.style.display = "none";

    furSel.disabled = true;
    marSel.disabled = true;
    wearsSel.disabled = true;
    electSel.disabled = false;
  }
  else if(cat == "Furniture"){
    document.getElementById('forFurniture').style.display = "block";
    document.getElementById('forElectronics').style.display = "none";
    document.getElementById('forMarbles').style.display = "none";
    document.getElementById('forWears').style.display = "none";

    electSel.disabled = true;
    furSel.disabled = false;
    marSel.disabled = true;
    wearsSel.disabled = true;
  }
  else if(cat == "Marbles"){
    document.getElementById('forMarbles').style.display = "block";
    document.getElementById('forFurniture').style.display = "none";
    document.getElementById('forElectronics').style.display = "none";
    document.getElementById('forWears').style.display = "none";

    electSel.disabled = true;
    furSel.disabled = true;
    marSel.disabled = false;
    wearsSel.disabled = true;
  }
  else if(cat == "Wears"){
    document.getElementById('forWears').style.display = "block";
    document.getElementById('forFurniture').style.display = "none";
    document.getElementById('forElectronics').style.display = "none";
    document.getElementById('forMarbles').style.display = "none";

    electSel.disabled = true;
    furSel.disabled = true;
    marSel.disabled = true;
    wearsSel.disabled = false;
  }
}