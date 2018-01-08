const li = require("steam-inventory");
li("xxxx", 730, 2, (items, error) => {
  if(error) {
    return console.log("Error, while getting user items. Please check settings or user inventory is hidden.");
  } 
  else {
    console.log(JSON.stringify(items)) ;
  }
});
