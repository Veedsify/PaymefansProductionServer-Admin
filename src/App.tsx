import { Outlet } from "react-router-dom"
import SideBar from "./components/main/sidebar";
const App = () => {
  return (
    <main className="mx-auto border"
    >
      <div className="grid grid-cols-7 min-h-screen">
        <div className="col-span-1 relative overflow-auto border pt-8">
          <SideBar />
        </div>
        <div className="col-span-6 p-4">
          <Outlet />
        </div>
      </div>
    </main>
  );
}

export default App;