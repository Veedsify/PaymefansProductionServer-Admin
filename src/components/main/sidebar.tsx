import { Link } from "react-router-dom";
import { sidebarlinks } from "../../data/sidebarlinks";

const SideBar = () => {
     const links = sidebarlinks();

     return (
          <nav className="block">
               <div className="p-6">
                    <h1 className="text-purple-800 font-bold font-sans text-xl uppercase mb-6">
                         Paymefans
                    </h1>
               </div>
               {
                    links.map((group, index) => (
                         <div key={index} className="px-2">
                              <p className="font-bold tracking-wider px-6 text-sm text-gray-500 mt-8">
                                   {group.group}
                              </p>
                              {
                                   group.links.map((link, index) => (
                                        <Link to={link.link}
                                             key={index}
                                             className="flex group group-hover:animate-pulse items-center gap-5 p-5 transition-all duration-200 hover:bg-slate-50 dark:hover:bg-gray-900">
                                             <span className="group-hover:animate-pulse">
                                                  {link.icon}
                                             </span>
                                             <p className="text-sm">
                                                  {link.title}
                                             </p>
                                        </Link>
                                   ))
                              }
                         </div>
                    ))
               }
          </nav>
     );
}

export default SideBar;