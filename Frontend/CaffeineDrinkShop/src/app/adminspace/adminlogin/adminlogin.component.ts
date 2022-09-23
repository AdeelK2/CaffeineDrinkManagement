import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import {
  FormBuilder,
  FormControl,
  FormGroup,
  Validators,
} from '@angular/forms';
import { DrinksdataserviceService } from 'src/app/drinksdataservice.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-adminlogin',
  templateUrl: './adminlogin.component.html',
  styleUrls: ['./adminlogin.component.css'],
})
export class AdminloginComponent implements OnInit {
  
  adminForm!: FormGroup;
  adminLogin = false;
  @Output() emitter:EventEmitter<string>
  = new EventEmitter<string>();

  emit(loginstatus: any){
  this.emitter.emit(loginstatus);
  }
  constructor(
    private drinksdataservice: DrinksdataserviceService,
    private route: Router
  ) {}
  dataArray: any =[]
  ngOnInit(): void {
    this.adminForm = this.formbuilder.group({
      email: [
        '',
        Validators.compose([Validators.required, Validators.maxLength(20)]),
      ],
      password: [
        '',
        Validators.compose([Validators.required, Validators.maxLength(20)]),
      ],
    });
  }

  formbuilder = new FormBuilder();

  getAdmin(value: any) {
     this.drinksdataservice.loadOneAdmin(value.email).subscribe((data)=>{
      
      if(data.data.email == "test@test.com" && data.data.password=='test123'){
        this.route.navigate(['admin/drinks']);
        this.adminLogin = true;
      }
    });
  }
  
}
