 window.editorCodes = [
    {
        code: `let str = "aabbbcccd";

let isStringFound = false;
for (let i = 0; i < str.length; i++) {
    if (str.indexOf(str[i]) === i && str.lastIndexOf(str[i]) === i) {
        console.log(str[i]);

        isStringFound = true;
        break;
    }
}

if (! isStringFound) {
    console.log("Not repeated character found");
}
        `,
    }, 
    
    {
        code: `
let arr = [1,2,[3,4,5, [6,7,8]]];

console.log(flatArray(arr));

function flatArray(arr, flatArr = []) {
   arr.forEach((item) => {
      if (typeof item == 'object') {
        return flatArray(item, flatArr);
      } else {
        flatArr.push(item);
      }
   })

  return flatArr;
}
`,
    },

    {
        code: `async function sleep(seconds){
  console.log("Before sleep");
  
  await new Promise(function(resolve){
    return setTimeout(resolve, 1000 * seconds)
  });

  console.log("After sleep");
}

sleep(2);
`
    },

    {
        code: `let arr = ['a', 'b', 'c', 'd', 'e', 'f'];

for (let i = arr.length - 1; i > 0; i--) {
  const j = Math.floor(Math.random() * (i + 1));

   let temp = arr[i];
   arr[i] = arr[j]
   arr[j] = temp; 
}

console.log(arr);`
    },

    {
      code: `let siblings = $('.permission').siblings();

siblings.each(function() {
  console.log($(this).text());
});`
    },

    {
      code: `$(document).click(function(e) {
  if (!$(e.target).closest('.run').length) {
    $('#hide-dropdown').hide();
  }
});

// Show dropdown
$('.run').click(function(e) {
  $('#hide-dropdown').show();
});
`
    }
];