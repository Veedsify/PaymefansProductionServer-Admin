"use client"
import {
     Tabs,
     TabsContent,
     TabsList,
     TabsTrigger,
} from "@/components/ui/tabs"
import {
     Card,
     CardContent,
     CardDescription,
     CardFooter,
     CardHeader,
     CardTitle,
} from "@/components/ui/card"
import {
     Table,
     TableBody,
     TableCell,
     TableHead,
     TableHeader,
     TableRow,
} from "@/components/ui/table"
import { Badge } from "../ui/badge"

type DashBoardTransactionsProps = {
     data: {
          trigger: 'week' | 'month' | 'year' | any
          filter?: 'fulfilled' | 'declined' | 'refunded'
     }
}

const DashBoardTransactions = ({ data }: DashBoardTransactionsProps) => {
     return (
          <TabsContent value={data.trigger}>
               <Card x-chunk="dashboard-05-chunk-3">
                    <CardHeader className="px-7">
                         <CardTitle>
                              Transaction this {String(data.trigger).charAt(0).toUpperCase() + String(data.trigger).slice(1)}
                         </CardTitle>
                         <CardDescription>
                              Recent transactions from your users this {String(data.trigger).charAt(0).toUpperCase() + String(data.trigger).slice(1)}
                         </CardDescription>
                    </CardHeader>
                    <CardContent>
                         <Table>
                              <TableHeader>
                                   <TableRow>
                                        <TableHead>Customer</TableHead>
                                        <TableHead className="hidden sm:table-cell">
                                             Type
                                        </TableHead>
                                        <TableHead className="hidden sm:table-cell">
                                             Status
                                        </TableHead>
                                        <TableHead className="hidden md:table-cell">
                                             Date
                                        </TableHead>
                                        <TableHead className="text-right">Amount</TableHead>
                                   </TableRow>
                              </TableHeader>
                              <TableBody>
                                   <TableRow className="bg-accent">
                                        <TableCell>
                                             <div className="font-medium">Liam Johnson</div>
                                             <div className="hidden text-sm text-muted-foreground md:inline">
                                                  liam@example.com
                                             </div>
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             Sale
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             <Badge className="text-xs" variant="secondary">
                                                  Fulfilled
                                             </Badge>
                                        </TableCell>
                                        <TableCell className="hidden md:table-cell">
                                             2023-06-23
                                        </TableCell>
                                        <TableCell className="text-right">$250.00</TableCell>
                                   </TableRow>
                                   <TableRow>
                                        <TableCell>
                                             <div className="font-medium">Olivia Smith</div>
                                             <div className="hidden text-sm text-muted-foreground md:inline">
                                                  olivia@example.com
                                             </div>
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             Refund
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             <Badge className="text-xs" variant="outline">
                                                  Declined
                                             </Badge>
                                        </TableCell>
                                        <TableCell className="hidden md:table-cell">
                                             2023-06-24
                                        </TableCell>
                                        <TableCell className="text-right">$150.00</TableCell>
                                   </TableRow>
                                   {/* <TableRow>
                    <TableCell>
                      <div className="font-medium">Liam Johnson</div>
                      <div className="hidden text-sm text-muted-foreground md:inline">
                        liam@example.com
                      </div>
                    </TableCell>
                    <TableCell className="hidden sm:table-cell">
                      Sale
                    </TableCell>
                    <TableCell className="hidden sm:table-cell">
                      <Badge className="text-xs" variant="secondary">
                        Fulfilled
                      </Badge>
                    </TableCell>
                    <TableCell className="hidden md:table-cell">
                      2023-06-23
                    </TableCell>
                    <TableCell className="text-right">$250.00</TableCell>
                  </TableRow> */}
                                   <TableRow>
                                        <TableCell>
                                             <div className="font-medium">Noah Williams</div>
                                             <div className="hidden text-sm text-muted-foreground md:inline">
                                                  noah@example.com
                                             </div>
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             Subscription
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             <Badge className="text-xs" variant="secondary">
                                                  Fulfilled
                                             </Badge>
                                        </TableCell>
                                        <TableCell className="hidden md:table-cell">
                                             2023-06-25
                                        </TableCell>
                                        <TableCell className="text-right">$350.00</TableCell>
                                   </TableRow>
                                   <TableRow>
                                        <TableCell>
                                             <div className="font-medium">Emma Brown</div>
                                             <div className="hidden text-sm text-muted-foreground md:inline">
                                                  emma@example.com
                                             </div>
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             Sale
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             <Badge className="text-xs" variant="secondary">
                                                  Fulfilled
                                             </Badge>
                                        </TableCell>
                                        <TableCell className="hidden md:table-cell">
                                             2023-06-26
                                        </TableCell>
                                        <TableCell className="text-right">$450.00</TableCell>
                                   </TableRow>
                                   <TableRow>
                                        <TableCell>
                                             <div className="font-medium">Liam Johnson</div>
                                             <div className="hidden text-sm text-muted-foreground md:inline">
                                                  liam@example.com
                                             </div>
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             Sale
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             <Badge className="text-xs" variant="secondary">
                                                  Fulfilled
                                             </Badge>
                                        </TableCell>
                                        <TableCell className="hidden md:table-cell">
                                             2023-06-23
                                        </TableCell>
                                        <TableCell className="text-right">$250.00</TableCell>
                                   </TableRow>
                                   <TableRow>
                                        <TableCell>
                                             <div className="font-medium">Olivia Smith</div>
                                             <div className="hidden text-sm text-muted-foreground md:inline">
                                                  olivia@example.com
                                             </div>
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             Refund
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             <Badge className="text-xs" variant="outline">
                                                  Declined
                                             </Badge>
                                        </TableCell>
                                        <TableCell className="hidden md:table-cell">
                                             2023-06-24
                                        </TableCell>
                                        <TableCell className="text-right">$150.00</TableCell>
                                   </TableRow>
                                   <TableRow>
                                        <TableCell>
                                             <div className="font-medium">Emma Brown</div>
                                             <div className="hidden text-sm text-muted-foreground md:inline">
                                                  emma@example.com
                                             </div>
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             Sale
                                        </TableCell>
                                        <TableCell className="hidden sm:table-cell">
                                             <Badge className="text-xs" variant="secondary">
                                                  Fulfilled
                                             </Badge>
                                        </TableCell>
                                        <TableCell className="hidden md:table-cell">
                                             2023-06-26
                                        </TableCell>
                                        <TableCell className="text-right">$450.00</TableCell>
                                   </TableRow>
                              </TableBody>
                         </Table>
                    </CardContent>
               </Card>
          </TabsContent>
     );
}

export default DashBoardTransactions;