import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable, of, throwError } from 'rxjs';
import { catchError, tap, map } from 'rxjs/operators';

import { Repuesto } from '../shared/repuesto';

@Injectable({
  providedIn: 'root',
})
export class RepuestoService {
  private repuestosUrl = 'http://localhost:8000/repuesto';
  private repuestosNewUrl = 'http://localhost:8000/repuesto/new';


  constructor(private http: HttpClient) {}

  getRepuestos(): Observable<Repuesto[]> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });

    return this.http.get<any>(this.repuestosUrl,{headers}).pipe(
      catchError(this.handleError)
    );
  }

  getMaxRepuestoId(): Observable<number> {
    return this.http.get<Repuesto[]>(this.repuestosUrl).pipe(
      // Get max value from an array
      map((data) =>
        Math.max.apply(
          Math,
          data.map(function (o) {
            return o.id;
          })
        )
      ),
      catchError(this.handleError)
    );
  }

  getRepuestoById(id: number): Observable<Repuesto> {
    const url = `${this.repuestosUrl}/details/${id}`;
    return this.http.get<Repuesto>(url).pipe(
      tap((data) => console.log('getRepuesto: ' + JSON.stringify(data))),
      catchError(this.handleError)
    );
  }

  createRepuesto(repuesto: Repuesto): Observable<Repuesto> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    repuesto.id = 0;
    return this.http
      .post<Repuesto>(this.repuestosNewUrl, repuesto, { headers: headers })
      .pipe(catchError(this.handleError));
  }

  deleteRepuesto(id: number): Observable<{}> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const url = `${this.repuestosUrl}/delete/${id}`;
    return this.http.delete<Repuesto>(url, { headers: headers }).pipe(
      catchError(this.handleError)
    );
  }

  updateRepuesto(repuesto: Repuesto): Observable<Repuesto> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const url = `${this.repuestosUrl}/edit/${repuesto.id}`;
    return this.http.put<Repuesto>(url, repuesto,{ headers: headers }).pipe(
      catchError(this.handleError)
    );
  }

  private handleError(err: any) {
    // in a real world app, we may send the server to some remote logging infrastructure
    // instead of just logging it to the console
    let errorMessage: string;
    if (err.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      errorMessage = `An error occurred: ${err.error.message}`;
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      errorMessage = `Backend returned code ${err.status}: ${err.body.error}`;
    }
    console.error(err);
    return throwError(errorMessage);
  }
}
