import { createBrowserRouter } from "react-router-dom"
import App from "../App"
import IndexPage from "../pages/main"

export const routes = createBrowserRouter([
     {
          path: "/",
          element: <App />,
          children: [
               { path: "/", element: <IndexPage /> }
          ]
     }, {
          path: "*",
          element: <h1>404 Not Found</h1>
     }
])