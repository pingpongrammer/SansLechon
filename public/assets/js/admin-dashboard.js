    //Avatar Dropdown
    function toggleDropdown() {
        let submenu = document.querySelector('#submenu');
        let arrowIcon = document.querySelector('#dropdownButton i.fa-arrow-down');

        submenu.classList.toggle("hidden");
        arrowIcon.classList.toggle("fa-arrow-up");
    }


    //Sidebar Hiding in the Left Side
    function toggleSideBar() {
    let sidebar = document.querySelector('#sidebar');
    let main = document.querySelector('.main');
    let header = document.querySelector('.header');

    sidebar.classList.toggle("hidden");
    main.classList.toggle("pl-4");
    header.classList.toggle("pl-4");

    header.classList.toggle("pl-60", !sidebar.classList.contains("hidden"));
    main.classList.toggle("pl-60", !sidebar.classList.contains("hidden"));
}

    function avatarDropdown() {
        let avatar = document.querySelector('#avatar');
        avatar.classList.toggle("hidden");
    }

    
    //Compose Message Modal
    function composeDialog(){
        let dialog = document.getElementById('composeDialog');
        dialog.classList.remove('hidden');
        dialog.classList.add('flex');
        setTimeout(()=>{
            dialog.classList.add('opacity-100');
        }, 20);
    }

    function hideComposeDialog(){
        let dialog = document.getElementById('composeDialog');
        dialog.classList.remove('opacity-100');
        setTimeout(()=>{
            dialog.classList.add('hidden');
            dialog.classList.remove('remove');
        }, 100);
    }

        
    //Reply Modal
        function replyDialog(){
            let dialog = document.getElementById('replyDialog');
            dialog.classList.remove('hidden');
            dialog.classList.add('flex');
            setTimeout(()=>{
                dialog.classList.add('opacity-100');
            }, 20);
        }
    
        function hideReplyDialog(){
            let dialog = document.getElementById('replyDialog');
            dialog.classList.remove('opacity-100');
            setTimeout(()=>{
                dialog.classList.add('hidden');
                dialog.classList.remove('remove');
            }, 100);
        }

    //Request Payment Modal
       function requestPayDialog(){
        let dialog = document.getElementById('requestDialog');
        dialog.classList.remove('hidden');
        dialog.classList.add('flex');
        setTimeout(()=>{
            dialog.classList.add('opacity-100');
        }, 20);
    }

    function hideRequestDialog(){
        let dialog = document.getElementById('requestDialog');
        dialog.classList.remove('opacity-100');
        setTimeout(()=>{
            dialog.classList.add('hidden');
            dialog.classList.remove('remove');
        }, 100);
    }

// For Orders Modal 
    function showAcceptDialog(){
        let dialog = document.getElementById('acceptDialog');
        dialog.classList.remove('hidden');
        dialog.classList.add('flex');
        setTimeout(()=>{
            dialog.classList.add('opacity-100');
        }, 20);
    }

    function hideAcceptDialog(){
        let dialog = document.getElementById('acceptDialog');
        dialog.classList.remove('opacity-100');
        setTimeout(()=>{
            dialog.classList.add('hidden');
            dialog.classList.remove('flex');
        }, 100);
    }



    function showPendingDialog(){
        let dialog = document.getElementById('pendingDialog');
        dialog.classList.remove('hidden');
        dialog.classList.add('flex');
        setTimeout(()=>{
            dialog.classList.add('opacity-100');
        }, 20);
    }

    function hidePendingDialog(){
        let dialog = document.getElementById('pendingDialog');
        dialog.classList.remove('opacity-100');
        setTimeout(()=>{
            dialog.classList.add('hidden');
            dialog.classList.remove('flex');
        }, 100);
    }

//End of Orders Modal


//  Alert Message Modal
    function alertMessage(){
        let message = document.getElementById('alertMess');
        message.classList.toggle('hidden');
    }


    function alertError(){
        let message = document.getElementById('alertErr');
        message.classList.toggle('hidden');
    }

// End of Alert Message MOdal


//Copy Button in marketer profile
const copyButton = document.getElementById('copyButton');
   const copiedText = copyButton.nextElementSibling; // Get the "Copied" text element

   copyButton.addEventListener('click', function () {
       // Get the text to copy from the <span> element
       const textToCopy = copyButton.parentElement.previousElementSibling.textContent;

       // Create a new textarea element to hold the text
       const textArea = document.createElement('textarea');
       textArea.value = textToCopy;

       // Append the textarea element to the DOM
       document.body.appendChild(textArea);

       // Select the text in the textarea
       textArea.select();

       // Execute the copy command
       document.execCommand('copy');

       // Remove the textarea element
       document.body.removeChild(textArea);

       // Show the "Copied" text
       copyButton.classList.add('clicked');

       // Optionally, you can reset the feedback after a delay
       setTimeout(() => {
           copyButton.classList.remove('clicked');
       }, 1000); // Adjust the duration as needed
   });


   //Customer Alert Message Modal
   function alertCusMessage(){
    let message = document.getElementById('alertMesss');
    message.classList.toggle('d-none');
}


function alertCusError(){
    let message = document.getElementById('alertErrr');
    message.classList.toggle('d-none');
}

function alertOrderPolicy() {
    let message = document.getElementById('alertOrderPolicy');
    message.remove();
}
// End of Alert Message MOdal