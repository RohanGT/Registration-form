    var textbody=document.getElementById("filename");

    file=document.getElementById("fileToUpload");

    actualbutton=document.getElementById ("browse-click")

    actualbutton.addEventListener ("click", function()

    {

        file.click();

    });



    document.addEventListener("DOMContentLoaded", function() {

    var elements = document.getElementsByTagName("INPUT");

    for (var i = 0; i < elements.length; i++) {

        elements[i].oninvalid = function(e) {

            e.target.setCustomValidity("");

            if (!e.target.validity.valid) {

                e.target.setCustomValidity("Please enter valid data");

            }

        };

        elements[i].oninput = function(e) {

            e.target.setCustomValidity("");

        };

    }

})

    setInterval (function()

    {

        //textbody=document.getElementById("filename");

        file=document.getElementById("fileToUpload");

        console.log(file.value.lastIndexOf('\\'));

        

        if (file.value!="")

            textbody.style="height: auto"

            textbody.innerHTML=file.value.slice (file.value.lastIndexOf('\\')+1);

    }, 500);
