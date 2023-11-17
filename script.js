new DataTable('#info');


$("a.removeRecord").live("click",function(event){
    event.stopPropagation();
    if(confirm("Do you want to delete?")) {
     this.click;
        alert("Ok");
    }
  
    event.preventDefault();
    
 });