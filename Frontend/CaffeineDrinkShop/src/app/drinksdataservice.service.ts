import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders, HttpParams, HttpResponse} from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, map, retry } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
@Injectable({
  providedIn: 'root'
})
export class DrinksdataserviceService {

  constructor(private http: HttpClient) { }
  
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      Authorization: 'my-auth-token',

    })
  };

  // Drinks Functions to interact with server

  loadAllDrinks(){
    
    const getAll_Url = environment.API_endpoint + 'api/drinks/read.php';
    
    return this.http.get(getAll_Url);

  }
  
  loadOneDrink(id: any){
    
    const getOne_Url = environment.API_endpoint + 'api/drinks/read_single.php?id=?';
    
    return this.http.post(getOne_Url,{id: id}).pipe(map(data => data))
    
  }

  CreateDrink(data: any): Observable<any> {
    
    const create_Url = environment.API_endpoint + 'api/drinks/create.php';

    return this.http.post<any>(create_Url, data, this.httpOptions)
      .pipe(
        catchError((error: any) => error.message)
      );
  }
  
  // Admin Function to interact with server

  loadOneAdmin(email: any, ): Observable<any> {
  
    return this.http.post(environment.API_endpoint + 'api/admin/read_single.php', {  email: email})
    
  }
  
  // CustomersStats Function to interact with server

  loadOneCustomerStat(){
    
    const getOne_Url = environment.API_endpoint + 'api/admin/read_single.php?id=?';
    
    return this.http.get(getOne_Url).pipe(map(data => data))
    
  }
  
  loadAllCustomerStats(){
    
    const getAll_Url = environment.API_endpoint + 'api/customer_stats/read.php';
    
    return this.http.get(getAll_Url).subscribe((res: any) =>{
      return res
    })

  }

  CreateCustomerStats(data: any): Observable<any> {
    
    const create_Url = environment.API_endpoint + 'api/customer_stats/create.php';

    return this.http.post<any>(create_Url, data)
      .pipe(
        catchError((error: any) => error.message)
      );
  }
  
  UpdateCustomerStats(data: any): Observable<any> {
    
    const create_Url = environment.API_endpoint + 'api/customer_stats/update.php?id=?';

    return this.http.put<any>(create_Url, data)
      .pipe(
        catchError((error: any) => error.message)
      );
  }

}
