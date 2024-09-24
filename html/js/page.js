function print_content(){
    let text_area = document.getElementById('text_area');
    for (line of text_area.children) {
        console.log(line.textContent);
    }
    // console.log(text_area.textContent);
}

window.onload = print_content;
