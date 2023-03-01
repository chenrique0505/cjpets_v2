fetch("https://valorant-agents-maps-arsenal.p.rapidapi.com/agents/es-es", {
    "method": "GET",
    "headers": {
        "x-rapidapi-host": "valorant-agents-maps-arsenal.p.rapidapi.com",
        "x-rapidapi-key": "b50a6e83cdmsh25bd77a5a8ee8eep1a1726jsn49db0ddeecfd"
    }
})
    .then(response => response.json())
    .then(data => {
        for (let x = 0; x <= 18; x++) {

            let element = document.getElementById(x)

            element.innerHTML =
                `<p>${data.agents[x].title}</p>
            <img src='${data.agents[x].agent_image.url}'/>`
        }



        console.log(data);
    })
    .catch(err => console.error(err))
