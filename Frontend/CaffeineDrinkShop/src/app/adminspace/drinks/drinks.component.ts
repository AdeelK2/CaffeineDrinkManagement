import { Component, Input, OnInit } from '@angular/core';
import { FormGroup, FormControl, FormBuilder, Validators } from '@angular/forms';
import { Router} from '@angular/router';
import { DrinksdataserviceService } from 'src/app/drinksdataservice.service';
import { Drink } from './drink';
@Component({
  selector: 'app-drinks',
  templateUrl: './drinks.component.html',
  styleUrls: ['./drinks.component.css']
})
export class DrinksComponent implements OnInit {
  
  allDrinks: any = [];
  @Input()
  loginstatus!: boolean;
  
  constructor(private drinksdataservice: DrinksdataserviceService, private route: Router) { }

  formbuilder = new FormBuilder();

  Drinks: any = [];

  drinkForm!: FormGroup;

  ngOnInit(): void {
    this.drinkForm = this.formbuilder.group({
      drink_name: ['',Validators.compose([
        Validators.required,
        Validators.maxLength(20)
      ])],
      drink_company_name: ['',Validators.compose([
        Validators.required,
        Validators.maxLength(20)
      ])],
      drink_code: ['',Validators.compose([
        Validators.required,
        Validators.maxLength(20)
      ])],
      price: ['',Validators.compose([
        Validators.required,
        Validators.maxLength(20)
      ])],
      drink_quantity: ['',Validators.compose([
        Validators.required,
        Validators.maxLength(20)
      ])],
      caffeine_qty: ['',Validators.compose([
        Validators.required,
        Validators.maxLength(20)
      ])],
      description: ['',Validators.compose([
        Validators.required,
        Validators.maxLength(100)
      ])]
    })
  }
  
  logout(){
    this.loginstatus = false;
    this.route.navigate(['customer/order']);
  }

  saveDrink(values: Drink) {
    // TODO: Use EventEmitter with form value
    let formData = new FormData;
    formData.append('drink_name', values.drink_name);
    formData.append('drink_company_name', values.drink_company_name);
    formData.append('drink_code', values.drink_code);
    formData.append('price', values.price);
    formData.append('drink_quantity', values.drink_quantity);
    formData.append('caffeine_qty', values.caffeine_qty);
    formData.append('description', values.description);

    this.drinksdataservice.CreateDrink(formData).subscribe(res => {
      if(res.message === "Drink Created"){
        this.Drinks.push(res);
        window.alert(res.message);
      }
    })
    
  }
  
  getAllDrinks() {
    const data = this.drinksdataservice.loadAllDrinks();
    this.allDrinks.push(data);
  }

}
