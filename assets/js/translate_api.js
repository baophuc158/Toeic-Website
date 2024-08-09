const options = {
  method: 'GET',
  headers: {
    'Authorization': 'Bearer 178268262695367569621106ecc8e469b8a67c1aa1074bfd0da4354441802a9208f128e404bda5c6edfc',
    'Content-Type': 'application/json'
  }
};

fetch('https://api.localazy.com/projects', options)
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error(error));