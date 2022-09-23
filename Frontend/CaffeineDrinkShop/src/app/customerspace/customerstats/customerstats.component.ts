import { Component, OnInit } from '@angular/core';
import { DrinksdataserviceService } from 'src/app/drinksdataservice.service';
import { FormGroup, FormControl, FormBuilder, Validators} from '@angular/forms';
import {MatDialog} from '@angular/material/dialog';
@Component({
  selector: 'app-customerstats',
  templateUrl: './customerstats.component.html',
  styleUrls: ['./customerstats.component.css'],
})
export class CustomerstatsComponent implements OnInit {

  CustomerStats: any = [];

  constructor(private drinksdataservice: DrinksdataserviceService,public fb: FormBuilder, public dialog: MatDialog) {}

  selectedOption!: any;

  thresholdCaffeineQty: number = 500;
  allDrinks:any;

  selected_drink_code: any;
  isSubmitted = false;

  CustomerOrderForm = new FormGroup({
    select_drink: new FormControl(''),
    caffeine_qty_consumed: new FormControl('')
  });

  ngOnInit(): void {
    this.getAllDrinks();

    this.CustomerOrderForm = this.fb.group({
      select_drink: ['', [Validators.required]],
      caffeine_qty_consumed: ['',[Validators.required]]
    });

  }

  selectedDrink(e: any) {
    this.selected_drink_code = e.target.value;
  }

  CaffeineQtyAchieved(values: any){
    const updatedCaffeineQty  = Number(values.caffeine_qty_consumed) + Number(values.select_drink);

    const leftQuan = Number(this.thresholdCaffeineQty) - Number(values.caffeine_qty_consumed);

    if(updatedCaffeineQty >= this.thresholdCaffeineQty){
      window.alert("You have reached the maximum caffeine quantity for today. Please be aware that it could cause a severe damage to your lunges if you take more caffeine today.")
    }else{
      window.alert("You have consumed " + values.caffeine_qty_consumed + "mg quantity of caffeine, you can take" + leftQuan + "mg more today as maximum caffeine quantity limit is 500.") 
    }
      // if(selectedDrinkCaffeineQty < )
  }

  onSubmit(formValues: any): void {

    this.isSubmitted = true;

    this.saveDrink(formValues);
    if (!this.CustomerOrderForm.valid) {
      false;
    } else {
      console.log(JSON.stringify(this.CustomerOrderForm.value));
    }
  }

  // Service Requests

  getOneDrink(code: any,){
    const data = this.drinksdataservice.loadOneDrink(code);
    // this.customerData.push(data);
  }

  getAllDrinks() {
    this.drinksdataservice.loadAllDrinks().subscribe((res: any) =>{
      this.allDrinks = res.data
    })

  }

  saveDrink(data: any) {

    let formData = new FormData;
    formData.append('select_drink', data.select_drink);
    formData.append('caffeine_qty_consumed', data.caffeine_qty_consumed);

    this.drinksdataservice.CreateCustomerStats(formData).subscribe(res => {
      if(res.message === "Drink Created"){
        this.CustomerStats.push(res);
        window.alert(res.message);
      }
    })

  }

}
