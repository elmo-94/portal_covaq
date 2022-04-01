//Get unique values for the desired columns


// {2 : ["M", "F"], 3 : ["RnD", "Enginnerging", "Design"], 4 : [], 5 : []}

function getUniqueValuesFromColumn(){

    var unique_col_values_dist = {}

    allFilters = document.querySelectorAll(".table-filter")
    allFilters.forEach((filter_i) => {
        col_index = filter_i.parentElement.getAttribute("col-index");
        //alert(col_index)
        const rows = document.querySelectorAll("#table-page > tbody > tr")

        rows.forEach((row) => {
            cell_value = row.querySelector("td:nth-child("+col_index+")").innerHTML;

            //if the col index is already present in the dict
            if(col_index in unique_col_values_dist){

                //if the cell value is already present in the array
                if(unique_col_values_dist[col_index].includes(cell_value)){
                    //alert(cell_value + "is already present in the array : " + unique_col_values_dist[col_index])
                }else{
                    unique_col_values_dist[col_index].push(cell_value)
                   //alert("Array after adding the cell value : " + unique_col_values_dist[col_index])

                }


            }else{
                unique_col_values_dist[col_index] = new Array(cell_value)
            }



        });

    });

    for(i in unique_col_values_dist){
        //alert("Column index : " + i + "has unique value : \n" + unique_col_values_dist[i])
    }

    updateSelectOption(unique_col_values_dist);
    


};

// Add <option> tag to desired columns based on the unique values

function updateSelectOption(unique_col_values_dist){
    allFilters = document.querySelectorAll(".table-filter")

    allFilters.forEach((filter_i) =>{

        col_index = filter_i.parentElement.getAttribute('col-index')

        unique_col_values_dist[col_index].forEach((i) => {
            filter_i.innerHTML = filter_i.innerHTML + `\n<option value="${i}">${i}</option>`
        })

    });
    

};

// Create filter_rows() function

//filter_value_dist {2 : value selected, 4:value, 5:value}

function filter_rows(){
    allFilters = document.querySelectorAll(".table-filter")
    var filter_value_dict = {}

    allFilters.forEach((filter_i) => {
        col_index = filter_i.parentElement.getAttribute('col-index')
        
        value = filter_i.value
        if(value != "all"){
            filter_value_dict[col_index] = value
        }

    });

    var col_cell_value_dict = {};
    var count=0;
    const rows = document.querySelectorAll("#table-page  tbody  tr");
    rows.forEach((row) => {
        var display_row = true;

        allFilters.forEach((filter_i) => {
            col_index = filter_i.parentElement.getAttribute('col-index')
            col_cell_value_dict[col_index] = row.querySelector("td:nth-child("+col_index+")").innerHTML

        })
        
        
        for(var col_i in filter_value_dict){
            filter_value = filter_value_dict[col_i]
            row_cell_value = col_cell_value_dict[col_i]
            
            if(row_cell_value.indexOf(filter_value) == -1 && filter_value != "all"){
                display_row = false;
                break;
                
            }
            count++;
                      
        }
        

        if(display_row == true){
            row.style.display = "table-row"
        }
        else{
            row.style.display = "none"
        }

        
        
    });
    var small = window.document.querySelectorAll('small')[1];
    if(count != 0){
        small.innerText='Registos encontrados: '+count;
    }else{
        str = window.document.querySelectorAll('small')[1];
        small.innerText = str.innerText;
    }
    
    
    
}