let Libro = {
    Titolo : 1984,
    Autore : "George Orwell",
    AnnoPubblicazione : 1949,
    Genere : "Distopico",
    NumeroPagine : 320
};
for (let key in Libro) {
    console.log(`${key} -> ${Libro[key]}`);
  }
