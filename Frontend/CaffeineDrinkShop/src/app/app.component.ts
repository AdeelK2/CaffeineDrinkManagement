import { Component } from '@angular/core';
import { DrinksdataserviceService } from './drinksdataservice.service';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  constructor(private drinksdataservice :DrinksdataserviceService) {}
  loginstatus = "";
  send(loginstatus: string){
    this.loginstatus = loginstatus;
  }
  allDrinks:any = [];
  
  allDrinksSubscribe: any;
  
  rowData: any = [];

  title = 'CaffeineDrinkShop';
  
  getAllDrinks(){
    
      const data = this.drinksdataservice.loadAllDrinks()
      this.allDrinks.push(data);
  }
  
  ngOnInit(){
    this.getAllDrinks()
  }
}
