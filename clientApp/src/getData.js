// getData file

// current local address of backend app
export const getData = () =>  {
    axios.get('http://localhost:8000/api/products').then(function (response) {
        console.log(response)
    })
}