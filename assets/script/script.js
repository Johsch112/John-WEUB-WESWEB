window.addEventListener("DOMContentLoaded", () => {
const searchInput = document.querySelector("[data-search]");
const DisplayBox = document.getElementById("searchdisplaybox");
// const triangle = document.querySelector(".tri1");

let firstSearch = true; 
searchInput.addEventListener("input", async () => {
    const value = searchInput.value.toLowerCase();
    const searchBoxData = document.querySelector('.datawrapper');
    if (firstSearch && value.length >= 3) {
        // triangle.style.animation = "spin 3s infinite linear";
    
        firstSearch = false;
    } else if (!firstSearch && value.length < 3) { 
        // triangle.style.animation = "";
        DisplayBox.innerHTML = "";
        firstSearch = true;
    }
    
    if (value.length >= 3) {

        console.log(value)
        let res = await fetch('http://localhost:8080/john-weub-wesweb/public/search.php?q=' + value);
        let data = await res.text();
        console.log(data);
        
        const items = data.toLowerCase().split("\n");
        const filteredItems = items.filter(item => item.includes(value));
        console.log(filteredItems);
           if (filteredItems.length === 0 || value === "") {
        DisplayBox.style.display = "none";
        return; 
    }else {
        DisplayBox.style.display = "flex";
    }



     DisplayBox.innerHTML = filteredItems


// DisplayBox.innerHTML="<h4>" + data + "</h4>"; 
    }

    // if (filteredItems.length === 0 || value === "") {
    //     DisplayBox.style.display = "none";
    //     return; 
    // }else {
    //     DisplayBox.style.display = "flex";
    // }



    //  DisplayBox.innerHTML = filteredItems
    //  .map(item => {
    //      const formattedURL = item.replace(/ /g, "/"); // Replace spaces with slashes
    //      return `<a href="/${formattedURL}" target="_blank">${item}</a><br>`;
    //  })
    //  .join("");
 



    //  console.log(ItemURL);
    //  BYT UT BLANKSTEG MOT /   str.replace(/ /g, "/")
     

});
});
