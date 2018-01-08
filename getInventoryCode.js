const li = require("steam-inventory");
li("76561198306639779", 730, 2, (items, error) => {
  if(error) {
    return console.log("Error, while getting user items. Please check settings or user inventory is hidden.");
  } 
  else {
    console.log(JSON.stringify(items)) ;
  }
});
