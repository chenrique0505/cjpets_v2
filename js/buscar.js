
function buscar(index)
{
fetch("https://spotify23.p.rapidapi.com/search/?q="+id+"&type=multi&offset=0&limit=15&numberOfTopResults=15", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "spotify23.p.rapidapi.com",
		"x-rapidapi-key": "8276761067msh253b26f70d99341p1683ccjsn0955911ac46d"
	}
})
.then(response => response.json())
.then(data => {
     for(let x=0; x<12; x++)
      {
          let element = document.getElementById(x)
          element.innerHTML =
          `<p>${data.albums.items[x].data.name}</p>
          <img src='${data.albums.items[x].data.coverArt.sources[0].url}'/>`
      }
	console.log(data);
})
.catch(err => console.error(err))
}