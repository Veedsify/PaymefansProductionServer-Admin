"use client"
import Link from "next/link";
import { Breadcrumb, BreadcrumbItem, BreadcrumbLink, BreadcrumbList, BreadcrumbPage, BreadcrumbSeparator } from "../ui/breadcrumb";
import { usePathname } from "next/navigation";
import { useEffect, useState } from "react";
const BreadCrumbs = () => {
  const [pathArray, setPathArray] = useState<{ name: string; url: string }[]>([])
  const pathname = usePathname()

  useEffect(() => {
    setPathArray(
        '/admin/path/em'.split('/').map((path, index, array) => {
        return {
          name: path,
          url: array.slice(0, index + 1).join('/')
        }
      }))

    console.log(pathArray);
  }, [pathname])

  return (
    <Breadcrumb className="hidden md:flex">
      <BreadcrumbList>
        <BreadcrumbItem>
          <BreadcrumbLink asChild>
            <Link href="#">Dashboard</Link>
          </BreadcrumbLink>
        </BreadcrumbItem>
        <BreadcrumbSeparator />
        <BreadcrumbItem>
          <BreadcrumbLink asChild>
            <Link href="#">Orders</Link>
          </BreadcrumbLink>
        </BreadcrumbItem>
        <BreadcrumbSeparator />
        <BreadcrumbItem>
          <BreadcrumbPage>Recent Orders</BreadcrumbPage>
        </BreadcrumbItem>
      </BreadcrumbList>
    </Breadcrumb>
  );
}

export default BreadCrumbs;