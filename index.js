let allBooks = document.getElementById("allBooks");
let books1 = document.getElementById("books");
let bList = document.getElementById("bookList");
let headRow = document.getElementById("headRow");
let tBody = document.getElementById("tBody");
let bookForm = document.getElementById("bookForm");
let bookTitle = document.getElementById("bTitle");
let bookAuthor = document.getElementById("bAuthor");
let currentPage = document.getElementById("onPage");
let maxPages = document.getElementById("maxPage");
let button = document.getElementById("submitBtn");
let rows = [];

let books = [
  {
    title: "The Hobbit",
    author: "J.R.R Tolkien",
    maxPages: 200,
    onPage: 60,
  },

  {
    title: "Harry Potter",
    author: "J.K Rowling",
    maxPages: 250,
    onPage: 150,
  },

  {
    title: "50 Shades of Grey",
    author: "E.L James",
    maxPages: 150,
    onPage: 150,
  },

  {
    title: "Don Quixote",
    author: "Miguel de Cervantes",
    maxPages: 350,
    onPage: 300,
  },

  {
    title: "Hamlet",
    author: "William Shakespeare",
    maxPages: 550,
    onPage: 550,
  },
];

let counter = 1;

for (var i = 0; i < books.length; i++) {
  var book = books[i];
  var bookInfo = book.title + " by " + book.author;
  const pElement = document.createElement("p");
  pElement.innerHTML += `<p>${bookInfo}</p>`;
  allBooks.appendChild(pElement);
  console.log(bookInfo);

  if (book.maxPages == book.onPage) {
    let read = console.log("You have already read " + bookInfo);
    const liElement = document.createElement("li");
    liElement.innerHTML += `<li>You have already read ${bookInfo}</li>`;
    liElement.style.color = "green";
    bList.appendChild(liElement);
    books1.appendChild(bList);
  } else {
    console.log("You still need to read " + bookInfo);
    const liElement = document.createElement("li");
    liElement.innerHTML += `<li>You still need to read ${bookInfo}</li>`;
    liElement.style.color = "red";
    bList.appendChild(liElement);
    books1.appendChild(bList);
  }

  let value = Object.values(books[i]);
  let row = document.createElement("tr");
  tBody.appendChild(row);
  row.setAttribute("id", "row" + counter);
  value.forEach((value) => {
    let cell = document.createElement("td");
    cell.innerText = value;
    let activeRow = document.getElementById("row" + counter);
    activeRow.appendChild(cell);
  });

  counter++;
}

let colNames = Object.getOwnPropertyNames(books[0]);
colNames.push("Progress");

colNames.forEach((element) => {
  let tHead = document.createElement("th");
  tHead.innerText = element;
  headRow.appendChild(tHead);
});

let count1 = 0;
bookForm.addEventListener("submit", function (e) {
  e.preventDefault();

  var table = document.getElementById("tBody");
  var row = table.insertRow(-1);
  var bookTitle = row.insertCell(0);
  var bookAuthor = row.insertCell(1);
  var currentPage = row.insertCell(2);
  var maxPage = row.insertCell(3);
  var progress = row.insertCell(4);
  let booktitle = (bookTitle.innerHTML =
    document.getElementById("bTitle").value);
  let bookauthor = (bookAuthor.innerHTML =
    document.getElementById("bAuthor").value);
  let currentpage = (currentPage.innerHTML =
    document.getElementById("onPage").value);
  let maxpage = (maxPage.innerHTML = document.getElementById("maxPage").value);

    // let allBooks = document.getElementById("allBooks");
    // let books1 = document.getElementById("books");
    // let bList = document.getElementById("bookList");
    // let headRow = document.getElementById("headRow");
    // let tBody = document.getElementById("tBody");
    // let bookForm = document.getElementById("bookForm");
    // let bookTitle = document.getElementById("bTitle");
    // let bookAuthor = document.getElementById("bAuthor");
    // let currentPage = document.getElementById("onPage");
    // let maxPages = document.getElementById("maxPage");
    // let button = document.getElementById("submitBtn");
    // let rows = [];

  books.push({
    title: booktitle,
    author: bookauthor,
    onPage: currentpage,
    maxPages: maxpage,
  });

  let newClass = "new" + count1;
  let enterPercent = percRead(books[books.length - 1]);
  progress.innerHTML = `<div class='progress ${newClass}'>
        <div class='myBar'>
            <p>${enterPercent}</p>
        </div>
    </div>`;
  let innerProgress = document.querySelector(`.${newClass} .myBar`);
  innerProgress.style.width = enterPercent;
  count1++;

  console.log(books);
});

function percRead(book) {
  let percent = (book.onPage / book.maxPage) * 100;
  percent = Math.trunc(percent);
  return percent + "%";
}

let c = 0;
rows.forEach((row) => {
  let percent = percRead(books[c]);
  cell = document.createElement("td");
  cell.innerHTML = `<div class='progress'>
        <div class='myBar'>
            <p>${percent}</p>
        </div>
    </div>`;
  row.appendChild(cell);
  c++;
});

let bars = document.querySelectorAll(".myBar");
let count = 0;
bars.forEach(bar => {
  let width = percRead(books[count]);
  bar.style.width = width;
  count++;
});
