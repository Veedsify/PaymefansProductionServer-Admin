import { LucideBarChartHorizontal, LucideUserMinus2, LucideUsers2, LucideSettings, LucideStore, ShoppingBag, MessagesSquare, MessageSquarePlus, LucideBookPlus, LucideBookDashed, LucideNotebookTabs, LucideArchive } from "lucide-react";

type SideBarLinksType = {
     group: string;
     links: {
          title: string;
          icon: JSX.Element;
          link: string;
     }[]
}[]


export const sidebarlinks = () => {
     return [
          {
               group: "Main",
               links: [
                    {
                         title: "Dashboard",
                         icon: <LucideBarChartHorizontal />,
                         link: "/"
                    }
               ]
          },
          {
               group: "Chats",
               links: [
                    {
                         title: "New Chat",
                         icon: <MessageSquarePlus />,
                         link: "/users"
                    },
                    {
                         title: "All Chats",
                         icon: <MessagesSquare />,
                         link: "/users"
                    }
               ]
          },
          {
               group: "Posts",
               links: [
                    {
                         title: "All Posts",
                         icon: <LucideArchive />,
                         link: "/users"
                    },
                    {
                         title: "My Posts",
                         icon: <LucideBookDashed />,
                         link: "/users"
                    }, {
                         title: "New Post",
                         icon: <LucideBookPlus />,
                         link: "/users"
                    }
               ]
          },
          {
               group: "Store",
               links: [
                    {
                         title: "All Products",
                         icon: <LucideStore />,
                         link: "/users"
                    }, {
                         title: "Orders",
                         icon: <ShoppingBag />,
                         link: "/users"
                    },
               ]
          },
          {
               group: "Users",
               links: [
                    {
                         title: "All Users",
                         icon: <LucideUsers2 />,
                         link: "/users"
                    }, {
                         title: "Ban Users",
                         icon: <LucideUserMinus2 />,
                         link: "/users"
                    }
               ]
          },
          {
               group: "Settings",
               links: [
                    {
                         title: "Settings",
                         icon: <LucideSettings />,
                         link: "/settings"
                    }
               ]
          }
     ] as SideBarLinksType
}
