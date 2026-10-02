 <div class="mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">

     <!-- table container -->
     <div class="bg-white shadow rounded-lg overflow-hidden">

         <!-- responsive table -->
         <div class="overflow-x-auto">
             <table class="w-full text-left border border-separate rounded border-slate-200">
                 <thead class="bg-[#ff454a]">

                     <tr>
                         <?php
                            foreach ($data['resolved_content']['columns'] as $column) {
                            ?>
                             <th scope="col" class="h-12 px-6 text-[18px] font-medium border-l first:border-l-0 stroke-[#4A6CC3] text-white bg-[#2C4073] text-center"><?= $column['title'] ?? "NA" ?> </th>
                         <?php } ?>
                     </tr>

                 </thead>
                 <tbody class="bg-white divide-y divide-gray-100">
                     <!-- row -->
                     <?php
                        foreach ($data['resolved_content']['data'] as $row_data) {
                            // print_r($row_data);
                        ?>
                         <tr class="hover:bg-gray-50">
                             <?php foreach ($row_data as $cell) {
                                //  print_r($cell)
                                 ?>
                                  <td class="h-12 px-6  transition duration-300 border-t border-l first:border-l-0 border-[#4A6CC3]  text-black text-center ">
                                     <?= htmlspecialchars($cell) ?>
                                 </td>
                             <?php } ?>
                         </tr>
                     <?php } ?>


                     <!-- add as many rows as needed -->
                 </tbody>
             </table>
         </div>

     </div>
 </div>