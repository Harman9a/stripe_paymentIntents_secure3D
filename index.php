<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div id="myDiv"></div>
    <button onclick="testPayment()">Click</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.js"></script>
    <script>
      testPayment = () => {
        axios
          .post("axios.php")
          .then((result) => {
            let data = result.data;

            console.log(data.next_action.redirect_to_url.url);

            window.location = data.next_action.redirect_to_url.url;

            // var iframe = document.createElement("iframe");
            // iframe.src = data.next_action.redirect_to_url.url;
            // iframe.width = 600;
            // iframe.height = 400;
            // document.getElementById("myDiv").appendChild(iframe);
          })
          .catch((err) => {
            console.log(err);
          });
      };
    </script>
  </body>
</html>
