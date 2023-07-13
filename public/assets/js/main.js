console.log('Hello World')

fetch('/api')
    .then(r=>r.json())
    .then(r=>{
        document.querySelector('pre').innerHTML = JSON.stringify(r, null, 2)
    })