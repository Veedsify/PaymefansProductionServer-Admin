type LayoutContainerProviderProps = {
     children: React.ReactNode;
}
const LayoutContainerProvider = ({ children }: LayoutContainerProviderProps) => {
     return (
          <main
               className="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16"
          >
               {children}
          </main>
     );
}

export default LayoutContainerProvider;