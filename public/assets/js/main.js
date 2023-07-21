console.log('Hello World')

fetch('/api')
    .then(r=>r.json())
    .then(r=>{
        //document.querySelector('pre').innerHTML = JSON.stringify(r, null, 2)
        //document.querySelector('#test_img').src = r.champ_selected[0].img

        console.log(r.json())

        let mainSection = document.querySelector('.select')

        for (let y = 0; y <= mainSection.childElementCount; y++) {

            function func(i){
                mainSection.children[i].children[0].children[3].children[0].value = r.champ_selected[i].nom
            }

            function named(i) {
                mainSection.children[i].children[0].children[1].children[0].src = r.champ_selected[i].img

                func(i)
            }

            for(champ in r.champ_selected){
                named(y)
            }
        }


    })